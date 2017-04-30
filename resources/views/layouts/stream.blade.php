@include('components.add-activity')

<!-- check if we have activities -->
@if (count($activities) > 1)
    @foreach ($activities as $activity)
        <div class="panel panel--sm activity">
            <ul>
                <li>{{$activity->type}}</li>
                <li>{{ User::userInfo( $activity->user_id )->name }}</li>
                <li>{{$activity->miles}}</li>
                <li>{{$activity->duration}}</li>
                <li>{{$activity->completed_on}}</li>
            </ul>
        </div>
    @endforeach
@endif