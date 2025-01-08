<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RepairBookingController;


Route::get('/', function () {
    return view('welcome'); 
})->name('home');

// Kontakt
Route::get('/kontakt', function () {
    return view('contact'); 
})->name('contact');

// Rezerwacja
Route::get('/rezerwacja', [RepairBookingController::class, 'create'])->name('reservation');
Route::post('/rezerwacja', [RepairBookingController::class, 'store'])->name('store');

// Sprawdź rezerwacje
Route::get('/sprawdz-rezerwacje', [RepairBookingController::class, 'index'])->name('check-reservation');


Route::get('/home', function () {
    return redirect('/');
});

Route::get('/sukces', function () {
    return view('success'); 
})->name('success');


// Obsługa logowania i rejestracji
Auth::routes();

Route::get('/edit/{id}', [RepairBookingController::class,'edit'])->name('edit');
Route::get('/delete/{id}', [RepairBookingController::class,'destroy'])->name('delete');
Route::post('/update/{id}', [RepairBookingController::class,'update'])->name('update');