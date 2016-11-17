@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-login">
                    <div class="panel-body">
                        <form class="form-horizontal form-auth" role="form" method="POST" action="{{ url('/login') }}">
                            <div class="form-header pad-xs-15">
                                <img class="login-logo" src="/images/stopwatch.svg" />
                            </div>

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label control-label--hidden">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email"
                                       placeholder="Email Address"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label control-label--hidden">Password</label>

                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                            {{--<div class="checkbox">--}}
                            {{--<label>--}}
                            {{--<input type="checkbox" name="remember"> Remember Me--}}
                            {{--</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group pad-xs-30">
                                <div class="col-sm-6">
                                    <a class="link link--small" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                                <div class="col-sm-6 form-submit--right">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
