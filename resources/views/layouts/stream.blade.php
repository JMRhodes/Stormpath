<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivitiesController;

?>

<!-- check if we have activities -->
<div class="container">
    <div class="row panels">
        {{--@include('components.add-activity')--}}
        @if (count($activities) > 0)
            @foreach ($activities as $activity)
                <div class="panel__item col s12 m6 l4 xl3">
                    <div class="card">
                        <div class="card-image">
                            @if (ActivitiesController::getFeaturedImage($activity))
                                <img src="{{ActivitiesController::getFeaturedImage($activity)}}"/>
                            @endif
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">
                                {{ User::userInfo( $activity->user_id )->name }}
                                <i class="material-icons right">more_vert</i>
                            </span>
                            <p>Completed a run of {{App\Helper\Conversions::intToFloat($activity->miles)}} mi.</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                        </div>
                        <div class="card-reveal" style="display: none; transform: translateY(0px);">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked
                                on.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>