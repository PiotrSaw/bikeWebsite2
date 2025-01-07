<?php
use Illuminate\Support\Facades\Route;
?>

@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div>
    <h2>{{ __('Potwierdź hasło') }}</h2>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <table>
                <tbody>
                    <tr>
                        <td><label for="password">{{ __('Hasło') }}</label></td>
                        <td>
                            <input id="password" type="password" name="password" required autocomplete="current-password">
                            @error('password')
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit">{{ __('Potwierdź hasło') }}</button></td>
                        <td>@if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Odzyskaj hasło') }}</a>
                        @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

@endsection
