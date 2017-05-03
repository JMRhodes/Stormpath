<?php

namespace App\Http\Controllers;

use App\Activities;
use App\FileEntry;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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

        // save file
        $file  = $request->file( 'image' );
        $entry = (object) [];
        if ( $file ) {
            $extension = $file->getClientOriginalExtension();
            Storage::disk( 'uploads' )->put( '/activities/' . $file->getFilename() . '.' . $extension, File::get( $file ) );
            $entry                    = new Fileentry();
            $entry->user_id           = Auth::user()->id;
            $entry->mime              = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename          = $file->getFilename() . '.' . $extension;
            $entry->save();
        }

        $activity = new Activities( [
            'user_id'      => Auth::user()->id,
            'type'         => 'run',
            'miles'        => isset( $_POST['miles'] ) ? $_POST['miles'] : 0,
            'duration'     => $_POST['duration'],
            'description'  => '',
            'thumbnail'    => isset( $entry->filename ) ? $entry->filename : '',
            'completed_on' => $date_completed . ' ' . $time_completed
        ] );

        // save initial user profile data
        $new_activity = $activity->save();

        return redirect( '/' );
    }

    public function delete( Request $request ) {
        $activity_id = filter_input( INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT );
        if ( ! $activity_id ) {
            return redirect( '/home' );
        }

        $activity = Activities::where( 'id', $activity_id )->get()->last();
        if ( Auth::user()->id == $activity->user_id ) {
            $activity->delete();
        }

        return redirect( '/' );
    }

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
