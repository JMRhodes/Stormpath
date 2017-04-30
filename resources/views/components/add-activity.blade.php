<?php
use App\Http\Controllers\FormFieldsController;

$fields = [
    [
        'fields' => [
            'miles' => [
                'label'           => 'Miles',
                'container_class' => 'col-xs-12 col-sm-6 float'
            ],
            'duration' => [
                'label'           => 'Duration',
                'container_class' => 'col-xs-12 col-sm-6 float'
            ],
            'date_completed' => [
                'label'           => 'Date',
                'container_class' => 'col-xs-12 col-sm-6 float datepicker'
            ],
            'time_completed' => [
                'label'           => 'Time',
                'container_class' => 'col-xs-12 col-sm-6 float timepicker'
            ],
        ]
    ],
];
?>

<div class="panel panel--lg profile">
    <div class="panel__header col-sm-12 pad-xs--15 pad-sm--30 pad--no-top">
        <h1 class="hdg hdg--2">Add Activity</h1>
    </div>

    <form class="form" role="form" method="POST" action="{{ url('/add-activity') }}">

        {{ csrf_field() }}

        <?php
        foreach ( $fields as $row ) {
            ( new FormFieldsController )->formRow( $row );
        }
        ?>

        <div class="form-row form--text-right col-sm-12 pad-sm--30 pad--no-bottom">
            <button type="submit" class="btn btn--secondary">
                Add Activity
            </button>
        </div>
    </form>
</div>