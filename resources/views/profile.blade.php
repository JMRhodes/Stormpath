@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 pad-xs--15 pad-sm--45">
                <div class="panel panel--lg profile">
                    <div class="panel__header col-sm-12 pad-xs--15 pad-sm--30 pad--no-top">
                        <h1 class="hdg hdg--2">Edit Profile</h1>
                    </div>
                    <div class="panel__sidebar col-sm-3">
                        <div class="profile__avatar">
                            <img src="/images/user.svg"/>
                        </div>
                    </div>
                    <div class="panel__content col-sm-9">
                        <div class="row">
                            <form class="form" role="form" method="POST" action="{{ url('/profile') }}">

                                {{ csrf_field() }}

                                <div class="form-row clearfix">
                                    <div class="col-xs-12 col-sm-6 float{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="float__label">Name</label>

                                        <input id="name" type="text" class="float__input" name="name"
                                               value="{{ Auth::user()->name }}" required>

                                        @if ($errors->has('name'))
                                            <span class="form__help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-xs-12 col-sm-6 float{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="float__label">E-Mail Address</label>

                                        <input id="email" type="email" class="float__input" name="email"
                                               value="{{ Auth::user()->email }}" required disabled>

                                        @if ($errors->has('email'))
                                            <span class="form__help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row clearfix">
                                    <div class="col-xs-12 col-sm-4 float">
                                        <label for="age" class="float__label">Age</label>

                                        <input id="age" type="age" class="float__input" name="age"
                                               value="{{ $profile->age }}">

                                        @if ($errors->has('age'))
                                            <span class="form__help-block">
                                                <strong>{{ $errors->first('age') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12 col-sm-4 float">
                                        <label for="height" class="float__label">Height</label>

                                        <input id="height" type="height" class="float__input" name="height"
                                               value="{{ $profile->height }}">

                                        @if ($errors->has('height'))
                                            <span class="form__help-block">
                                                <strong>{{ $errors->first('height') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12 col-sm-4 float">
                                        <label for="weight" class="float__label">Weight</label>

                                        <input id="weight" type="weight" class="float__input" name="weight"
                                               value="{{ $profile->weight }}">

                                        @if ($errors->has('weight'))
                                            <span class="form__help-block">
                                                <strong>{{ $errors->first('weight') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row clearfix">
                                    <div class="col-xs-12 float">
                                        <label for="bio" class="float__label">Bio</label>

                                        <textarea id="bio" type="bio" class="float__input" name="bio" rows="4"></textarea>

                                        @if ($errors->has('bio'))
                                            <span class="form__help-block">
                                                <strong>{{ $errors->first('bio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row form--text-right col-sm-12 pad-sm--60 pad--no-bottom">
                                    <button type="submit" class="btn btn--secondary">
                                        Save changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection