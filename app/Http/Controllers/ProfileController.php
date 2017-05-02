<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use App\FileEntry;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
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
        $this->validate( $input, [
            'name'     => 'required|max:255',
            'password' => 'min:6|confirmed'
        ] );

        $user         = User::find( Auth::user()->id );
        $user_profile = UserProfile::where( 'user_id', Auth::user()->id )->get()->last();

        // save file
        $file = $input->file( 'image' );
        if ( $file ) {
            $extension = $file->getClientOriginalExtension();
            Storage::disk( 'uploads' )->put( '/avatars/' . $file->getFilename() . '.' . $extension, File::get( $file ) );
            $entry                    = new Fileentry();
            $entry->user_id           = Auth::user()->id;
            $entry->mime              = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename          = $file->getFilename() . '.' . $extension;
            $entry->save();
        }

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

    public static function getUserAvatar( $user_id ) {
        $file = FileEntry::where( 'user_id', $user_id )->get()->last();
        if ( $file->filename ) {
            $exists = Storage::disk( 'uploads' )->exists( 'avatars/' . $file->filename );
            if ( $exists ) {
                return url( 'uploads/avatars/' . $file->filename );
            }
        }

        return url( '/images/user.svg' );
    }
}
