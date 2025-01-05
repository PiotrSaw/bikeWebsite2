@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="container">
    <h2>{{ __('Zarejestruj się') }}</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="name" class="col-form-label">{{ __('Imię') }}</label>
                    </td>
                    <td>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                            autofocus>

                        @error('name')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email" class="col-form-label">{{ __('Adres email') }}</label>
                    </td>
                    <td>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password" class="col-form-label">{{ __('Hasło') }}</label>
                    </td>
                    <td>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                        @error('password')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password-confirm" class="col-form-label">{{ __('Powtórz hasło') }}</label>
                    </td>
                    <td>
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="new-password">
                    </td>
                </tr>
            </tbody>
        </table>
                <button type="submit">
                    {{ __('Zarejestruj się') }}
                </button>
    </form>
</div>
@endsection