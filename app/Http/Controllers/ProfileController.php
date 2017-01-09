<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
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
        $user_profile = UserProfile::where( 'user_id', Auth::user()->id )->get()->first();

        return view( 'profile', [ 'profile' => $user_profile ] );
    }

    /**
     * Update user info from profile form post data
     *
     * @param Request $input
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update( Request $input ) {
        $this->validate( $input, [
            'name'     => 'required|max:255',
            'password' => 'min:6|confirmed'
        ] );
        $user         = User::find( Auth::user()->id );
        $user_profile = UserProfile::where( 'user_id', Auth::user()->id )->get()->first();

        $user->name           = $input["name"];
        $user_profile->name   = $input["name"];
        $user_profile->age    = $input["age"];
        $user_profile->weight = $input["weight"];
        $user_profile->height = $input["height"];
        if ( $input->has( 'password' ) ) {
            $user->password = bcrypt( $input['password'] );
        }
        $user->save();
        $user_profile->save();

        return redirect( 'profile' );
    }
}
