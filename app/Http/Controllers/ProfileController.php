<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use App\FileEntry;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

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
        ini_set( 'memory_limit', '256M' );

        $this->validate( $input, [
            'name'     => 'required|max:255',
            'password' => 'min:6|confirmed'
        ] );

        $user         = User::find( Auth::user()->id );
        $user_profile = UserProfile::where( 'user_id', Auth::user()->id )->get()->last();

        // save file
        $avatar = $user_profile->avatar;

        // handle image uploading
        $image = Input::file( 'image' );
        if ( $image ) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path( 'uploads/avatars/' . $filename );
            Image::make( $image->getRealPath() )->fit( 300 )->orientate()->save( $path );

            $entry                    = new Fileentry();
            $entry->user_id           = Auth::user()->id;
            $entry->mime              = $image->getClientMimeType();
            $entry->original_filename = $image->getClientOriginalName();
            $entry->filename          = $filename;
            $entry->save();

            $avatar = $filename;
        }

        $user->name           = $input["name"];
        $user_profile->name   = $input["name"];
        $user_profile->age    = $input["age"];
        $user_profile->weight = $input["weight"];
        $user_profile->height = $input["height"];
        $user_profile->avatar = $avatar;
        if ( $input->has( 'password' ) ) {
            $user->password = bcrypt( $input['password'] );
        }
        $user->save();
        $user_profile->save();

        return redirect( 'profile' );
    }

    /**
     * @param $user_id
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function getUserAvatar( $user_id ) {
        $user_profile = UserProfile::where( 'user_id', $user_id )->get()->last();
        if ( ! empty( $user_profile->avatar ) ) {
            $file = FileEntry::where( 'filename', $user_profile->avatar )->get()->last();
            if ( isset( $file->filename ) ) {
                $exists = Storage::disk( 'uploads' )->exists( 'avatars/' . $file->filename );
                if ( $exists ) {
                    return url( 'uploads/avatars/' . $file->filename );
                }
            }
        }

        return url( '/images/user.svg' );
    }
}
