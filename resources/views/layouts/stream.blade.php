<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivitiesController;
?>

@include('components.page-header')

<!-- check if we have activities -->
<div class="panels">
    @include('components.add-activity')

    @if (count($activities) > 0)
        @foreach ($activities as $activity)
            <div class="panel panel--sm activity">
                <div class="panel__image">
                    <img src="{{ActivitiesController::getFeaturedImage($activity)}}"/>
                </div>
                <div class="panel__user">
                    <div class="user__avatar-image">
                        <img src="{{ProfileController::getUserAvatar($activity->user_id)}}"/>
                    </div>
                    <h2 class="hdg hdg--4 hdg--semi-bold">
                        {{ User::userInfo( $activity->user_id )->name }}
                    </h2>
                </div>
                <div class="panel__meta">
                    <div class="panel__miles">
                        {{App\Helper\Conversions::intToFloat($activity->miles)}}
                    </div>
                </div>
                <div class="panel__date">
                    {{\App\Helper\Conversions::getPostElapsedTime($activity->completed_on)}}
                </div>
            </div>
        @endforeach
    @endif
</div>