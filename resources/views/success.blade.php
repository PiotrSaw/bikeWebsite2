<!DOCTYPE html>

<html lang="pl">

<head>
    <title> Bike master </title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="kontener">
        <header>
            <h1>Bike master</h1>
        </header>
        @include('layouts.nav')

        <main style="background-color: #0a0a0a; padding: 20px; border-radius: 10px; margin-top: 20px;">
            <h2>Rezerwacja została pomyślnie dokonana!</h2>
            <p>Twoja rezerwacja naprawy roweru została zapisana. Dziękujemy za skorzystanie z naszej usługi.</p>
        </main>
    </div>
</body>