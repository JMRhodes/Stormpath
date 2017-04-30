<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $activities = ( new ActivitiesController() )->index();

        return view( 'home', [ 'activities' => $activities ] );
    }
}
