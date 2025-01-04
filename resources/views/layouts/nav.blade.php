<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
?>

<nav>
    <a href="{{ url('/') }}">Strona główna</a>
    <a href="{{ route('contact') }}">Kontakt</a>
    <a href="{{ route('reservation') }}">Rezerwacja</a>
    <a href="{{ route('check-reservation') }}">Sprawdź rezerwacje</a>
    @guest
        <a href="{{ route('login') }}">Zaloguj</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Zarejestruj</a>
        @endif
    @else
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Wyloguj ({{ Auth::user()->name }})
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</nav>

