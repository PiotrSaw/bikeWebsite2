<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome'); // Zamień na odpowiedni widok
})->name('home');

// Kontakt
Route::get('/kontakt', function () {
    return view('contact'); // Zamień na odpowiedni widok
})->name('contact');

// Rezerwacja
Route::get('/rezerwacja', function () {
    return view('reservation'); // Zamień na odpowiedni widok
})->name('reservation');

// Sprawdź rezerwacje
Route::get('/sprawdz-rezerwacje', function () {
    return view('check-reservation'); // Zamień na odpowiedni widok
})->name('check-reservation');

// Obsługa logowania i rejestracji
Auth::routes();

Route::get('/home', function () {
    return redirect('/');
});