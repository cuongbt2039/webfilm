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


Route::get('/', 'PlayerController@index');
Route::post('api/player/post', 'PlayerApi@postEpisode')->middleware('api');
Route::get('api/player/get', 'PlayerApi@getEpisode')->middleware('api');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('home', 'AdminController@index');
    Route::get('manage-film/{id}', ['as' => 'id', 'uses' => 'AdminController@manageFilm']);
    Route::any('edit-episode', 'AdminController@editEpisode');
    Route::any('new-episode', 'AdminController@newEpisode');
});
