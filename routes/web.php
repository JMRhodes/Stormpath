<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get( '/', 'HomeController@index' );
Route::get( '/home', 'HomeController@index' );

Route::get( '/profile', [
    'middleware' => [ 'auth' ],
    'uses'       => 'ProfileController@index'
] );

Route::get( 'profile/get/{filename}', [
    'as'   => 'getentry',
    'uses' => 'FileEntryController@get'
] );

Route::post( '/profile/update', [
    'middleware' => [ 'auth' ],
    'uses'       => 'ProfileController@update'
] );

Route::post( '/add-activity', [
    'middleware' => [ 'auth' ],
    'uses'       => 'ActivitiesController@create'
] );

Route::post( '/delete-activity', [
    'middleware' => [ 'auth' ],
    'uses'       => 'ActivitiesController@delete'
] );
