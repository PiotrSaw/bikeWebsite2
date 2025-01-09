<?php

namespace App\Http\Controllers;

use App\Models\RepairBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RepairBookingController extends Controller
{
    public function index()
    {
        // Pobierz zalogowanego użytkownika
        $user = Auth::user();

        // Sprawdź rolę użytkownika
        if ($user->status === 'ADMIN') {
            $repair_bookings = RepairBooking::whereDate('repair_date', '>=', Carbon::now()->toDateString())
            ->orderBy('repair_date', 'asc')->get();

            $repair_bookings_archival = RepairBooking::whereDate('repair_date', '<', Carbon::now()->toDateString())
            ->orderBy('repair_date', 'desc')->get();
        } else {
            $repair_bookings = RepairBooking::where('user_id', $user->id)
                ->whereDate('repair_date', '>=', Carbon::now()->toDateString())
                ->orderBy('repair_date', 'asc')->get();

            $repair_bookings_archival = RepairBooking::where('user_id', $user->id)
                ->whereDate('repair_date', '<', Carbon::now()->toDateString())
                ->orderBy('repair_date', 'desc')->get();
        }


        // Przekaż dane do widoku
        return view('check-reservation', compact('repair_bookings', 'repair_bookings_archival'));
    }

    public function create()
    {
        $repair = new RepairBooking;
        return view('reservation', ['reservation' => $repair]);
    }


    public function store(Request $request)
    {
        // Podstawowa walidacja formularza:
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'repair_date' => 'required|date|after_or_equal:today',
            'repair_date.after_or_equal' => 'Nie można podać daty z przeszłości.',
            'bike_type' => 'required',
            'repair_items' => 'required|array',
            'payment_method' => 'required',
        ], [
            'name.required' => 'Pole "Imię" jest wymagane.',
            'email.required' => 'Pole "Email" jest wymagane.',
            'email.email' => 'Pole "Email" musi być poprawnym adresem email.',
            'repair_date.required' => 'Pole "Data naprawy" jest wymagane.',
            'bike_type.required' => 'Pole "Typ roweru" jest wymagane.',
            'repair_items.required' => 'Pole "Co chcesz naprawiać?" jest wymagane.',
            'payment_method.required' => 'Pole "Sposób płatności" jest wymagane.',
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
    public function destroy($id)
    {
        //Znajdź komentarz o danych id:
        $reservation = RepairBooking::find($id);
        //Sprawdz czy użytkownik jest autorem komentarza:
        if (Auth::user()->id != $reservation->user_id) {
            return back();
        }
        if ($reservation->delete()) {
            return redirect()->route('check-reservation');
        } else
            return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'repair_date' => 'required|date|after_or_equal:today',
            'bike_type' => 'required',
            'repair_items' => 'required|array',
            'payment_method' => 'required',
        ], [
            'name.required' => 'Pole "Imię" jest wymagane.',
            'email.required' => 'Pole "Email" jest wymagane.',
            'email.email' => 'Pole "Email" musi być poprawnym adresem email.',
            'repair_date.required' => 'Pole "Data naprawy" jest wymagane.',
            'bike_type.required' => 'Pole "Typ roweru" jest wymagane.',
            'repair_items.required' => 'Pole "Co chcesz naprawiać?" jest wymagane.',
            'payment_method.required' => 'Pole "Sposób płatności" jest wymagane.',
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

        $reservation = RepairBooking::find($id);

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

    public function edit($id)
    {
        $reservation = RepairBooking::find($id);
        if (Auth::user()->id != $reservation->user_id && Auth::user()->status != 'ADMIN') {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.'
            ]);
        }
        return view('reservationEditForm', ['reservation' => $reservation]);
    }



}
