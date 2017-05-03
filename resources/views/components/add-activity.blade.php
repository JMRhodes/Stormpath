<?php
use App\Http\Controllers\FormFieldsController;

$fields = [
    [
        'fields' => [
            'miles' => [
                'label'           => 'Miles (0.00)',
                'container_class' => 'float'
            ],
            'duration' => [
                'label'           => 'Duration (hh:mm:ss)',
                'container_class' => 'float'
            ],
            'date_completed' => [
                'label'           => 'Date',
                'container_class' => 'float datepicker'
            ]
        ]
    ],
];
?>

<div class="panel__item col-sm-3 add-activity">
    <div class="panel">
        <div class="panel__header">
            <div class="panel__header-icon">
                <svg class="icon icon-circle-plus"><use xlink:href="#icon-circle-plus"></use></svg>
            </div>
            <h2 class="hdg hdg--3 hdg--semi-bold hdg--black">
                Add a Run
            </h2>
        </div>
        <div class="panel__content panel__content--no-padding-bottom">
            <form class="form" role="form" method="POST" action="{{ url('/add-activity') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <?php
                foreach ( $fields as $row ) {
                    ( new FormFieldsController )->formRow( $row );
                }
                ?>

                <div class="float">
                    <input type="file" name="image"/>
                </div>

                <div class="form-row pad-sm--30 pad--no-bottom">
                    <button type="submit" class="btn btn--primary btn--full">
                        Post a Run
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>