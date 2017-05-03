<?php
use App\Http\Controllers\FormFieldsController;
use App\Http\Controllers\ProfileController;

$fields = [
    [
        'fields' => [
            'name'  => [
                'label'           => 'Name',
                'value'           => Auth::user()->name,
                'container_class' => 'col-xs-12 col-sm-6 float'
            ],
            'email' => [
                'label'           => 'E-Mail',
                'value'           => Auth::user()->email,
                'container_class' => 'col-xs-12 col-sm-6 float'
            ],
        ]
    ],
    [
        'fields' => [
            'age'    => [
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

@section('title', 'Edit Profile')

@section('content')
    @include('components.page-header')

    <div class="container">
        <div class="panel panel--lg profile">
            <form class="form" role="form" method="POST" action="{{ url('/profile/update') }}" enctype="multipart/form-data">
                <div class="panel__sidebar col-sm-2">
                    <div class="profile__avatar">
                        <img src="{{ProfileController::getUserAvatar($profile->user_id)}}"/>
                    </div>

                    <input type="file" name="image"/>
                </div>
                <div class="panel__content col-sm-10">
                    <div class="row">

                        {{ csrf_field() }}

                        <?php
                        foreach ( $fields as $row ) {
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

                        <div class="form-row form--text-right col-sm-12 pad-sm--30 pad--no-bottom">
                            <button type="submit" class="btn btn--primary">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="clearfix"></div>
        </div>
    </div>
@endsection