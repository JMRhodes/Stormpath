<?php

namespace App\Http\Controllers;

use App\Activities;
use App\FileEntry;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

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
     * @param Request $request
     *
     * @return Activity
     */
    protected function create( Request $request ) {
        date_default_timezone_set( 'America/Chicago' );
        $date_completed = $_POST['date_completed_submit'] ?: date( 'Y-m-d' );
        $time_completed = isset( $_POST['time_completed_submit'] ) ? $_POST['time_completed_submit'] : date( 'H:i:s', time() );

        // handle image uploading
        $thumbnail = '';
        $image     = Input::file( 'image' );
        if ( $image ) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path( 'uploads/activities/' . $filename );
            Image::make( $image->getRealPath() )->resize( 800, null, function ( $constraint ) {
                $constraint->aspectRatio();
            } )->save( $path );

            $entry                    = new Fileentry();
            $entry->user_id           = Auth::user()->id;
            $entry->mime              = $image->getClientMimeType();
            $entry->original_filename = $image->getClientOriginalName();
            $entry->filename          = $filename;
            $entry->save();

            $thumbnail = $filename;
        }

        $activity = new Activities( [
            'user_id'      => Auth::user()->id,
            'type'         => 'run',
            'miles'        => isset( $_POST['miles'] ) ? $_POST['miles'] : 0,
            'duration'     => $_POST['duration'],
            'description'  => '',
            'thumbnail'    => $thumbnail,
            'completed_on' => $date_completed . ' ' . $time_completed
        ] );

        // save initial user profile data
        $activity->save();

        return redirect( '/' );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete( Request $request ) {
        $activity_id = filter_input( INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT );
        if ( ! $activity_id ) {
            return redirect( '/' );
        }

        $activity = Activities::where( 'id', $activity_id )->get()->last();
        if ( Auth::user()->id == $activity->user_id ) {
            $activity->delete();
        }

        return redirect( '/' );
    }

    /**
     * @param $activity
     *
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function getFeaturedImage( $activity ) {
        if ( ! $activity->thumbnail ) {
            return false;
        }
        $file   = FileEntry::where( 'filename', $activity->thumbnail )->get()->last();
        $exists = Storage::disk( 'uploads' )->exists( 'activities/' . $file->filename );
        if ( $file->filename && $exists ) {
            return url( 'uploads/activities/' . $file->filename );
        }

        return false;
    }
}
