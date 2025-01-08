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
                <form role="form" method="post" action="{{ route('store') }}" id="rezervation-from">
                    @csrf
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    @if(Auth::user()->status == 'ADMIN')
                                    <input type="text" name="name" id="imie" placeholder="Wprowadź imię">
                                    @else
                                    <input type="text" name="name" id="imie" placeholder="Wprowadź imię"
                                        value="{{ Auth::user()->name }}" readonly style="color: #676767;">
                                    @endif
                                    </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    @if(Auth::user()->status == 'ADMIN')
                                    <input type="text" name="email" id="email" placeholder="Wprowadź email">
                                    @else
                                    <input type="text" name="email" id="email" placeholder="Wprowadź email"
                                        value="{{ Auth::user()->email }}" readonly style="color: #676767;">
                                    @endif
                                    </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="date" name="repair_date" id="data" placeholder="Wprowadź datę">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select id="typ" name="bike_type">
                                        <option value="" disabled selected>Wybierz typ roweru</option>
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
                                <td><input type="checkbox" name="repair_items[]" value="koła" id="koła">Koła</td>
                                <td><input type="checkbox" name="repair_items[]" value="pedały" id="pedały">Pedały</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="repair_items[]" value="łańcuch" id="łańcuch">Łańcuch</td>
                                <td><input type="checkbox" name="repair_items[]" value="zębatki" id="zębatki">Zębatki</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="repair_items[]" value="hamulce" id="hamulce">Hamulce</td>
                                <td><input type="checkbox" name="repair_items[]" value="kierownica"
                                        id="kierownica">Kierownica</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="repair_items[]" value="przerzutki"
                                        id="przerzutki">Przerzutki</td>
                                <td><input type="checkbox" name="repair_items[]" value="inne" id="inne">Inne</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h4>Sposób płatności</h4>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="payment_method" value="gotówka" id="gotowka">Gotówka</td>
                                <td><input type="radio" name="payment_method" value="kartaPłatnicza"
                                        id="kartaPlatnicza">Karta
                                    płatnicza</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="payment_method" value="blik" id="blik">Blik</td>
                                <td><input type="radio" name="payment_method" value="kartaPodatunkowa"
                                        id="kartaPodatunkowa">Karta
                                    podarunkowa</td>
                            </tr>
                            <tr>
                                <td><button id='rezerwuj'>Zarezerwuj</button></td>
                                <td><a href="{{ route(name: 'reservation') }}" id="anuluj" class="button">Anuluj</a></td>
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