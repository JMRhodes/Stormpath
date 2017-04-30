<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;

class UserController extends Controller {

    /**
     * Retrieve user info
     *
     * @param $user_id
     *
     * @return \Illuminate\Http\Response
     */
    public static function userInfo( $user_id ) {
        $user_profile = UserProfile::where( 'user_id', $user_id )->get()->first();

        return $user_profile;
    }
}
