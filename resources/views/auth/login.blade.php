<?php

use Illuminate\Support\Facades\Route;
?>

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div>
    <h2>{{ __('Zaloguj się') }}</h2>
    <form method="POST" action="{{ route('login') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <table>
                <tbody>
                    <tr>
                        <td><label for="email">{{ __('Adres email') }}</label></td>
                        <td><input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                            @error('email')
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password">{{ __('Hasło') }}</label></td>
                        <td><input id="password" type="password" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        </td>
                        <td><label for="remember">{{ __('Zapamiętaj mnie') }}</label></td>
                    </tr>
                    <tr>
                        <td><button type="submit">{{ __('Zaloguj się') }}</button></td>
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