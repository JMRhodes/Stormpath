@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form form__auth" role="form" method="POST" action="{{ url('/password/email') }}">
                    <div class="form__auth-header">
                        <a href="{{ url('/') }}">
                            <img class="form__auth-logo" src="{{ config('app.logo_url') }}"/>
                            <h1 class="hdg hdg--2 hdg--semi-bold">{{ config('app.name') }}</h1>
                        </a>
                    </div>

                    <div class="form__title pad-xs--30 pad-sm--45">
                        <h1 class="hdg hdg--2">Send Password Reset</h1>
                    </div>
                    {{ csrf_field() }}

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

                    <div class="form-group pad-xs--30">
                        <button type="submit" class="btn btn--full btn--primary">
                            Send Password Reset Link
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
