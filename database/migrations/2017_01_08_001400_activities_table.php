<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivitiesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'activities', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'user_id' );
            $table->string( 'type' );
            $table->float( 'miles' );
            $table->string( 'duration' );
            $table->text( 'description' );
            $table->string( 'thumbnail' );
            $table->date( 'completed_on' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'activities' );
    }
}
