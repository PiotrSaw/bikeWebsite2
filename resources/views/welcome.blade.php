<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bike master </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/photos.css') }}">
    <script src="{{ asset('js/slide.js') }}"></script>
    <script src="{{ asset('js/photos.js') }}"></script>

</head>

<body>
    <div id="kontener">
        <header>
            <h1>Bike master</h1>
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
            <h2>Ponad 100 lat pasji i doświadczenia</h2>
            <h3>O nas</h3>
            <p>
                Jesteśmy firmą z siedzibą w Lublinie, działającą nieprzerwanie od 1920 roku. Nasza pasja do rowerów i
                zamiłowanie do doskonałości napędzają nas każdego dnia. Zaczynaliśmy jako mały warsztat, ale dzięki
                nieustannemu dążeniu do jakości i innowacji staliśmy się jednym z najbardziej zaufanych serwisów
                rowerowych w regionie.
            </p>
            <p>
                Nasz zespół składa się z doświadczonych mechaników i entuzjastów rowerowych, którzy nie tylko znają
                każdy model roweru na wylot, ale także sami regularnie jeżdżą. Dzięki temu doskonale rozumiemy potrzeby
                naszych klientów, niezależnie od tego, czy są to rowerzyści miejscy, górscy, czy też miłośnicy
                długodystansowych wypraw.
            </p>
            <p>
                Oferujemy szeroki zakres usług, od podstawowych napraw i konserwacji po zaawansowane tuningowanie i
                personalizację rowerów. W naszym warsztacie używamy tylko najwyższej jakości części i narzędzi, aby
                zapewnić, że każdy rower, który opuszcza nasze progi, jest w doskonałym stanie. Współpracujemy z wieloma
                renomowanymi producentami, co pozwala nam na dostęp do najnowszych technologii i rozwiązań.
            </p>
            <p>
                Jesteśmy dumni z naszego dziedzictwa, ale jednocześnie patrzymy w przyszłość. Regularnie organizujemy
                warsztaty i szkolenia dla młodych adeptów sztuki rowerowej, a także wspieramy lokalne imprezy i zawody
                rowerowe. Chcemy, aby nasza społeczność rowerowa rosła i rozwijała się, dlatego angażujemy się w
                różnorodne inicjatywy promujące zdrowy i aktywny tryb życia.
            </p>
            <p>
                Wierzymy, że rower to nie tylko środek transportu, ale styl życia. To sposób na poznawanie świata,
                przeżywanie przygód i dbanie o własne zdrowie. Dlatego dokładamy wszelkich starań, aby każdy nasz klient
                mógł cieszyć się jazdą na rowerze bez żadnych przeszkód. Zapraszamy do odwiedzenia naszego serwisu i
                dołączenia do rodziny Bike Master – miejsca, gdzie każdy rower jest traktowany z najwyższą troską i
                uwagą.
            </p>

            <h2>Nie wiesz jaki masz typ roweru?</h2>
            <h3>Sprawdź tutaj:</h3>

            <div id="content2">
                <div id="gallery">
                    <div class="gallery-container">
                        <div class="gallery-item">
                            <img src="{{ asset('photos/rower_gorski.jpg') }}" alt="Rower górski">
                            <div class="caption">Rower górski</div>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('photos/rower_miejski.jpg') }}" alt="Rower miejski">
                            <div class="caption">Rower miejski</div>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('photos/rower_trekkingowy.jpg') }}" alt="Rower trekkingowy">
                            <div class="caption">Rower trekkingowy</div>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('photos/rower_szosowy.jpg') }}" alt="Rower szosowy">
                            <div class="caption">Rower szosowy</div>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('photos/bmx.jpg') }}" alt="BMX">
                            <div class="caption">BMX</div>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('photos/rower_crossowy.jpg') }}" alt="Rower crossowy">
                            <div class="caption">Rower crossowy</div>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('photos/rower_dzieciecy.jpg') }}" alt="Rower dziecięcy">
                            <div class="caption">Rower dziecięcy</div>
                        </div>
                    </div>
                </div>
                <div id="przyciski">
                    <button id="prev">Poprzedni</button>
                    <button id="next">Następny</button>
                </div>

            </div>
        </main>


        <footer>&copy;PS 2025</footer>
    </div>

</body>

</html>