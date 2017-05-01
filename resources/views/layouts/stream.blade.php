@include('components.page-header')

<!-- check if we have activities -->
@if (count($activities) > 1)
    <div class="panels">
        @include('components.add-activity')

        @foreach ($activities as $activity)
            <div class="panel panel--sm activity">
                <div class="panel__user">
                    <img class="user__avatar-image" src="/images/user.svg"/>
                    <h2 class="hdg hdg--4 hdg--semi-bold">
                        {{ User::userInfo( $activity->user_id )->name }}
                    </h2>
                </div>
                <ul>
                    <li>{{ User::userInfo( $activity->user_id )->name }}</li>
                    <li>{{$activity->miles}}</li>
                    <li>{{$activity->duration}}</li>
                </ul>
                <div class="panel__date">
                    {{\App\Helper\Conversions::getPostElapsedTime($activity->completed_on)}}
                </div>
            </div>
        @endforeach
    </div>
@endif