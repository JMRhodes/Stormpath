<?php
use App\Http\Controllers\FormFieldsController;

$fields = [
    [
        'fields' => [
            'name'  => [
                'label' => 'Name',
                'value' => Auth::user()->name,
                'container_class' => 'col-xs-12 col-sm-6 float'
            ],
            'email' => [
                'label' => 'E-Mail',
                'value' => Auth::user()->email,
                'container_class' => 'col-xs-12 col-sm-6 float'
            ],
        ]
    ],
    [
        'fields' => [
            'age'  => [
                'label'           => 'Age',
                'value'           => $profile->age,
                'container_class' => 'col-xs-12 col-sm-4 float'
            ],
            'height' => [
                'label'           => 'Height',
                'value'           => $profile->height,
                'container_class' => 'col-xs-12 col-sm-4 float'
            ],
            'weight' => [
                'label'           => 'Weight',
                'value'           => $profile->weight,
                'container_class' => 'col-xs-12 col-sm-4 float'
            ],
        ]
    ],
];
?>

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

                                <?php
                                foreach ( $fields as $row) {
                                    ( new FormFieldsController )->formRow( $row );
                                }
                                ?>

                                <div class="form-row clearfix">
                                    <div class="col-xs-12 float">
                                        <label for="bio" class="float__label">Bio</label>

                                        <textarea id="bio" type="bio" class="float__input" name="bio"
                                                  rows="4"></textarea>

                                        @if ($errors->has('bio'))
                                            <span class="form__help-block">
                                                <strong>{{ $errors->first('bio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row form--text-right col-sm-12 pad-sm--60 pad--no-bottom">
                                    <button type="submit" class="btn btn--primary">
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