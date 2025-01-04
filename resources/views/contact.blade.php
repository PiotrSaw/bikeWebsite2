<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Master</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/slide.js') }}"></script>
    <script src="kontaktFetchApi.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body>
    <div id="kontener">
        <header>
            <h1>Kontakt</h1>
        </header>
        @include('layouts.nav')
        <div id="content">
            <div id="slideshow">
                <img src="{{ asset('photos/rower1.jpg') }}" alt="image1" class="active">
                <img src="{{ asset('photos/rower2.jpg') }}" alt="image2">
                <img src="{{ asset('photos/rower3.jpg') }}" alt="image3">
                <img src="{{ asset('photos/rower4.jpg') }}" alt="image3">
                <img src="{{ asset('photos/rower5.jpg') }}" alt="image3">
                <img src="{{ asset('photos/rower6.jpg') }}" alt="image3">
                <img src="{{ asset('photos/rower7.jpg') }}" alt="image3">
            </div>
        </div>

        <main>
            <div id="kontakt">
                <div id="telefon" class="kontakt">
                    <img src="{{asset('icons/telefon.png')}}" alt="ikona telefon">
                    <div class="tresc">
                        <p>telefon: 81-111-22-33</p>
                        <p>telefon: 81-567-88-99</p>
                    </div>
                </div>
                <div id="komorka" class="kontakt">
                    <img src="{{asset('icons/telefon komórkowy.png')}}" alt="ikona komórka">
                    <div calss="tresc">
                        <p>telefon komórkowy: 123-456-789</p>
                        <p>telefon komórkowy: 111-222-333</p>
                    </div>
                </div>
                <div id="email" class="kontakt">
                    <img src="{{asset('icons/email.png')}}" alt="ikona email">
                    <div class="tresc">
                        <p>email: serwis@rowery.pl</p>
                        <p>email: naprawa@rowery.pl</p>
                    </div>
                </div>
                <div id="adres" class="kontakt">
                    <img src="{{asset('icons/adres.png')}}" alt="ikona adres">
                    <div class="tresc">
                        <p>ulica Rowerowa 23a<br>20-567 Lublin</p>
                    </div>
                </div>
            </div>
            <div id="map"></div>

        </main>

        <footer>&copy;PS 2025</footer>
    </div>


    <script src="{{asset('js/map.js')}}"></script>

</body>

</html>