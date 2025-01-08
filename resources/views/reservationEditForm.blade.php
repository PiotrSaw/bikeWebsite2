<?php
use Illuminate\Support\Facades\Auth;
?>

<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bike master </title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
</head>

<body>
    <div id="kontener">
        <header>
            <h1>Zarezerwuj naprawę już dzisiaj</h1>
        </header>
        @include('layouts.nav')

        <main>
            @guest
                <h2>Zaloguj się żeby zarezerwować termin naprawy swojego roweru</h2>
            @endguest
            @auth
                <h2>Wypełnij formularz żeby zarezerwować termin naprawy swojego roweru</h2>
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="post" action="{{ route('update', $reservation) }}" id="rezervation-from">
                    @csrf
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    @if(Auth::user()->status == 'ADMIN')
                                    <input type="text" name="name" id="imie" placeholder="Wprowadź imię"
                                        value="{{ $reservation->name }}">
                                    @else
                                    <input type="text" name="name" id="imie" placeholder="Wprowadź imię"
                                        value="{{ $reservation->name }}" readonly style="color: #676767;">
                                    @endif
                                    </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    @if(Auth::user()->status == 'ADMIN')
                                    <input type="text" name="email" id="email" placeholder="Wprowadź email"
                                        value="{{ $reservation->email }}">
                                    @else
                                    <input type="text" name="email" id="email" placeholder="Wprowadź email"
                                        value="{{ $reservation->email }}" readonly style="color: #676767;">
                                    @endif
                                    </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="date" name="repair_date" id="data" placeholder="Wprowadź datę" value="{{ $reservation->repair_date }}">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select id="typ" name="bike_type" value="{{ $reservation->bike_type }}">
                                        <option value="górski">Górski</option>
                                        <option value="miejski">Miejski</option>
                                        <option value="trekkingowy">Trekkingowy</option>
                                        <option value="szosowy">Szosowy</option>
                                        <option value="crossowy">Crossowy</option>
                                        <option value="bmx">BMX</option>
                                        <option value="dziecięcy">Dziecięcy</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h4>Co chcesz naprawiać?</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="repair_items[]" value="koła" id="koła"
                                    {{ in_array('koła', explode(",", $reservation->repair_items)) ? 'checked' : '' }}>Koła
                                </td>
                                <td>
                                    <input type="checkbox" name="repair_items[]" value="pedały" id="pedały"
                                    {{ in_array('pedały', explode(",", $reservation->repair_items)) ? 'checked' : '' }}>Pedały
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="repair_items[]" value="łańcuch" id="łańcuch"
                                    {{ in_array('łańcuch', explode(",", $reservation->repair_items)) ? 'checked' : '' }}>Łańcuch
                                </td>
                                <td>
                                    <input type="checkbox" name="repair_items[]" value="zębatki" id="zębatki"
                                    {{ in_array('zębatki', explode(",", $reservation->repair_items)) ? 'checked' : '' }}>Zębatki
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="repair_items[]" value="hamulce" id="hamulce"
                                    {{ in_array('hamulce', explode(",", $reservation->repair_items)) ? 'checked' : '' }}>Hamulce
                                </td>
                                <td>
                                    <input type="checkbox" name="repair_items[]" value="kierownica" id="kierownica"
                                    {{ in_array('kierownica', explode(",", $reservation->repair_items)) ? 'checked' : '' }}>Kierownica
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="repair_items[]" value="przerzutki" id="przerzutki"
                                    {{ in_array('przerzutki', explode(",", $reservation->repair_items)) ? 'checked' : '' }}>Przerzutki
                                </td>
                                <td>
                                    <input type="checkbox" name="repair_items[]" value="inne" id="inne"
                                    {{ in_array('inne', explode(",", $reservation->repair_items)) ? 'checked' : '' }}>Inne
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h4>Sposób płatności</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="payment_method" value="gotówka" id="gotowka"
                                    {{($reservation->payment_method == 'gotówka') ? 'checked' : ''}}>Gotówka
                                </td>
                                <td>
                                    <input type="radio" name="payment_method" value="kartaPłatnicza" id="kartaPlatnicza"
                                    {{($reservation->payment_method == 'kartaPłatnicza') ? 'checked' : ''}}>Karta płatnicza
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="payment_method" value="blik" id="blik"
                                    {{($reservation->payment_method == 'blik') ? 'checked' : ''}}>Blik
                                </td>
                                <td>
                                    <input type="radio" name="payment_method" value="kartaPodatunkowa" id="kartaPodatunkowa"
                                    {{($reservation->payment_method == 'kartaPodatunkowa') ? 'checked' : ''}}>Karta podarunkowa
                                </td>
                            </tr>
                            <tr>
                                <td><button id='rezerwuj'>Zapisz</button></td>
                                <td><a href="{{ route('check-reservation') }}" id="anuluj" class="button">Anuluj</a></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            @endauth
        </main>


        <footer>&copy;PS 2025</footer>
    </div>

</body>

</html>