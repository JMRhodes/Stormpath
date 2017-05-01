<?php
use App\Http\Controllers\FormFieldsController;

$fields = [
    [
        'fields' => [
            'miles' => [
                'label'           => 'Miles',
            ],
            'duration' => [
                'label'           => 'Duration',
            ],
            'date_completed' => [
                'label'           => 'Date',
                'container_class' => 'datepicker'
            ],
            'time_completed' => [
                'label'           => 'Time',
                'container_class' => 'timepicker'
            ],
        ]
    ],
];
?>

<div class="panel panel--sm profile">
    <div class="panel__header pad-xs--15 pad-sm--30 pad--no-top">
        <h1 class="hdg hdg--2">Add Activity</h1>
    </div>

    <form class="form" role="form" method="POST" action="{{ url('/add-activity') }}">
        {{ csrf_field() }}

        <?php
        foreach ( $fields as $row ) {
            ( new FormFieldsController )->formRow( $row );
        }
        ?>

        <div class="form-row pad-sm--30 pad--no-bottom">
            <button type="submit" class="btn btn--primary btn--full">
                Post a Run
            </button>
        </div>
    </form>
</div>