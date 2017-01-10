<?php

namespace App\Http\Controllers;

use App\Activities;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller {
    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Create a new activity instance
     *
     * @return Activity
     */
    protected function create() {
        if( ! isset( $_POST['type'] ) ) {
            return redirect('/home');
        }

        $activity = new Activities( [
            'user_id' => Auth::user()->id,
            'type' => $_POST['type'],
            'miles' => $_POST['miles'],
            'duration' => $_POST['duration'],
            'description' => '',
            'completed_on' => '2017-01-09 15:40:07'
        ] );

        // save initial user profile data
        $activity->save();

        return redirect('/home');
    }
}
