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
    <link id="styl" rel="stylesheet" href="{{asset('css/browser.css')}}">

</head>

<body>
    <div id="kontener">
        <header>
            <h1>Obecne rezerwacje</h1>
        </header>
        @include('layouts.nav')

        @auth
            <main id="przegladarka">
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Typ roweru</th>
                            <th>Data naprawy</th>
                            <th>Naprawiane części</th>
                            <th>Sposób zapłaty</th>
                            <th></th><th></th>
                        </tr>
                    <tbody>
                        @foreach ($repair_bookings as $reservation)
                            <tr>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->bike_type }}</td>
                                <td>{{ $reservation->repair_date }}</td>
                                <td>{{ $reservation->repair_items }}</td>
                                <td>{{ $reservation->payment_method }}</td>
                                <td><a href="{{ route('edit', $reservation) }}" title="Edytuj">Edytuj</a></td>
                                <td><a href="{{ route('delete', $reservation->id) }}"
                                    onclick="return confirm('Jesteś pewien?')" title="Skasuj">Usuń</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2>Archiwalne rezerwacje</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id rezerwacji</th>
                            <th>Nazwa użytkownika</th>
                            <th>Email</th>
                            <th>Typ roweru</th>
                            <th>Data naprawy</th>
                            <th>Naprawiane części</th>
                            <th>Sposób zapłaty</th>
                        </tr>
                    <tbody>
                        @foreach ($repair_bookings_archival as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->bike_type }}</td>
                                <td>{{ $reservation->repair_date }}</td>
                                <td>{{ $reservation->repair_items }}</td>
                                <td>{{ $reservation->payment_method }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
        @endauth

        @guest
            <main>
                <b>Zaloguj się aby przejrzeć rezerwacje.</b>
            </main>
        @endguest

        <footer>&copy;PS 2025</footer>
    </div>

</body>

</html>