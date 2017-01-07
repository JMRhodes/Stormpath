@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form form__auth" role="form" method="POST" action="{{ url('/login') }}">
                    <div class="form__auth-header">
                        <img class="form__auth-logo" src="/images/stopwatch.svg"/>
                        <h1 class="hdg hdg--2 hdg--semi-bold">Esthetic</h1>
                    </div>

                    <div class="form__title pad-xs--30 pad-sm--45">
                        <h1 class="hdg hdg--2">Sign in</h1>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group float{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="float__label">Username</label>

                        <input id="email" type="email" class="float__input" name="email"
                               value="{{ old('email') }}" required autofocus>

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

                    <div class="form-group pad-xs--30">
                        <button type="submit" class="btn btn--full btn--primary">
                            Login
                        </button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 form__link">
                                <a class="form__link--small" href="{{ url('/register') }}">
                                    Don't have an account?
                                </a>
                            </div>
                            <div class="col-sm-6 form__link--right">
                                <a class="form__link--small" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
