@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div>
    <h2>{{ __('Odzyskaj hasło') }}</h2>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <table>
                <tbody>
                    <tr>
                        <td><label for="email">{{ __('Adres email') }}</label></td>
                        <td>
                            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password">{{ __('Nowe hasło') }}</label></td>
                        <td>
                            <input id="password" type="password" name="password" required autocomplete="new-password">
                            @error('password')
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password-confirm">{{ __('Potwierdź nowe hasło') }}</label></td>
                        <td>
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit">{{ __('Zresetuj hasło') }}</button></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

@endsection
