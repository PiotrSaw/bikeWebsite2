<?php

namespace App\Http\Controllers;

use App\Models\RepairBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RepairBookingController extends Controller
{
    public function create()
    {
        $repair = new RepairBooking;
        return view('reservation', ['reservation' => $repair]);
    }


    public function store(Request $request)
    {
        // Podstawowa walidacja formularza:
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'repair_date' => 'required|date|after_or_equal:today', // Dodajemy walidację daty (po dzisiejszej dacie)
            'bike_type' => 'required|string|max:255',
            'repair_items' => 'required|array|min:1', // Musi być przynajmniej jedna naprawa
            'payment_method' => 'required|in:gotówka,kartaPłatnicza,blik,kartaPodatunkowa',
        ]);
    
        if (Auth::user() == null) {
            return redirect()->route('home'); // jeśli użytkownik nie jest zalogowany
        }
    
        // Zabezpiecz się przed złym formatem daty
        $repair_date = Carbon::parse($request->input('repair_date'))->format('Y-m-d');
    
        // Dozwolone elementy naprawy
        $allowed_items = ['koła', 'pedały', 'łańcuch', 'zębatki', 'hamulce', 'kierownica', 'przerzutki', 'inne'];
    
        foreach ($request->input('repair_items') as $item) {
            if (!in_array($item, $allowed_items)) {
                return back()->withErrors('Jedno z wybranych elementów naprawy jest niepoprawne.');
            }
        }
    
        // Łączenie wartości tablicy w ciąg znaków, oddzielony przecinkiem
        $repair_items_string = implode(',', $request->input('repair_items'));
    
        // Tworzymy nową rezerwację
        $reservation = new RepairBooking();
    
        // Wypełniamy model danymi z formularza
        $reservation->user_id = Auth::id();  // ID aktualnie zalogowanego użytkownika
        $reservation->name = $request->input('name');
        $reservation->email = $request->input('email');
        $reservation->repair_date = $repair_date;
        $reservation->bike_type = $request->input('bike_type');
        $reservation->repair_items = $repair_items_string;  // String oddzielony przecinkiem
        $reservation->payment_method = $request->input('payment_method');
    
        // Zapisujemy rezerwację
        if ($reservation->save()) {
            return redirect()->route('success'); // Po udanym zapisie przekierowujemy na stronę sukcesu
        }
    
        // Jeśli zapis się nie udał, zwracamy formularz z błędami
        return back()->withInput()->withErrors('Coś poszło nie tak przy zapisywaniu rezerwacji.');
    }
    



}
