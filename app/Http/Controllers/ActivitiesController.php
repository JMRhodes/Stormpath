<?php

namespace App\Http\Controllers;

use App\Activities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller {
    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $activities = DB::table( 'activities' )->latest( 'completed_on' )->get();

        return $activities;
    }

    /**
     * Create a new activity instance
     *
     * @return Activity
     */
    protected function create() {
        date_default_timezone_set('America/Chicago');
        $date_completed = $_POST['date_completed_submit'] ?: date( 'Y-m-d' );
        $time_completed = $_POST['time_completed_submit'] ?: date( 'H:i:s', time() );

        //$_POST['type']

        $activity = new Activities( [
            'user_id'      => Auth::user()->id,
            'type'         => 'run',
            'miles'        => isset( $_POST['miles'] ) ? $_POST['miles'] : 0,
            'duration'     => $_POST['duration'],
            'description'  => '',
            'completed_on' => $date_completed . ' ' . $time_completed
        ] );

        // save initial user profile data
        $activity->save();

        return redirect( '/home' );
    }
}
