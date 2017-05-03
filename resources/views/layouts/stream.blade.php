<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivitiesController;

?>

<!-- check if we have activities -->
<div class="container">
    <div class="panels row">
        @include('components.add-activity')
        @if (count($activities) > 0)
            @foreach ($activities as $activity)
                <div class="panel__item col-sm-3">
                    <div class="panel">
                        @if (ActivitiesController::getFeaturedImage($activity))
                            <div class="panel__image">
                                <img src="{{ActivitiesController::getFeaturedImage($activity)}}"/>
                            </div>
                        @endif
                        <div class="panel__header">
                            <div class="user__avatar-image">
                                <img src="{{ProfileController::getUserAvatar($activity->user_id)}}"/>
                            </div>
                            <h2 class="hdg hdg--3 hdg--semi-bold">
                                {{ User::userInfo( $activity->user_id )->name }}
                            </h2>
                        </div>
                        <div class="panel__content">
                            <div class="panel__miles">
                                {{App\Helper\Conversions::intToFloat($activity->miles)}}
                            </div>
                            @if ($activity->description)
                                <div class="panel__description">
                                    {{$activity->description}}
                                </div>
                            @endif
                        </div>
                        <div class="panel__footer">
                            {{--{{\App\Helper\Conversions::getPostElapsedTime($activity->completed_on)}}--}}
                            {{\App\Helper\Conversions::getPostedDate($activity->completed_on)}}

                            @if (Auth::user()->id == $activity->user_id)
                                <a class="panel__delete" href="{{ url('/delete-activity?id='.$activity->id) }}">
                                    <svg class="icon icon-trash">
                                        <use xlink:href="#icon-trash"></use>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>