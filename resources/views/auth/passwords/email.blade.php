@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div>
    <h2>{{ __('Odzyskaj hasło') }}</h2>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <table>
                <tbody>
                    <tr>
                        <td><label for="email">{{ __('Adres email') }}</label></td>
                        <td>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit">{{ __('Wyślij link do resetowania hasła') }}</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

@endsection
