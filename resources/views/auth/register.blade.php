@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form__auth-header">
                    <a href="{{ url('/') }}">
                        <img class="form__auth-logo" src="{{ config('app.logo_url') }}"/>
                        <h1 class="hdg hdg--1 hdg--semi-bold">{{ config('app.name') }}</h1>
                    </a>
                </div>

                <form class="form form__auth" role="form" method="POST" action="{{ url('/register') }}">
                    <div class="form__title">
                        <h1 class="hdg hdg--2 hdg--semi-bold">Create new account</h1>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group float{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="float__label">Name</label>

                        <input id="name" type="text" class="float__input" name="name"
                               value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="form__help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group float{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="float__label">E-Mail Address</label>

                        <input id="email" type="email" class="float__input" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="form__help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group float{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="float__label">Password</label>

                        <input id="password" type="password" class="float__input" name="password" required>

                        @if ($errors->has('password'))
                            <span class="form__help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group float">
                        <label for="password-confirm" class="float__label">Confirm Password</label>

                        <input id="password-confirm" type="password" class="float__input"
                               name="password_confirmation" required>
                    </div>

                    <div class="form-group pad-xs--30">
                        <button type="submit" class="btn btn--full btn--primary">
                            Register
                        </button>
                    </div>
                    <div class="form-group">
                        <div class="form__link">
                            <a class="form__link--small" href="{{ url('/login') }}">
                                Back to login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
