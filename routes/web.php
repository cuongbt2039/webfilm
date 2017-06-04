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

define("NUMBER_SLIDE_SHOW_EPISOE", 3);
Route::get('/', 'PlayerController@index');
Route::get('nguoi-phan-xu-tap-{episodeId}', ['as'=>'episodeId', 'uses'=>'PlayerController@play']);
Route::get('gioi-thieu-nguoi-phan-xu', 'FilmStoryController@storyPost');
Route::get('dien-vien-trong-nguoi-phan-xu', 'FilmStoryController@filmCharacterPost');

Route::post('api/player/post', 'PlayerApi@postEpisode')->middleware('api');
Route::get('api/player/get', 'PlayerApi@getEpisode')->middleware('api');
Route::get('api/player/next', 'PlayerApi@nextEpisode')->middleware('api');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('home', 'AdminController@index');
    Route::get('manage-film/{id}', ['as' => 'id', 'uses' => 'AdminController@manageFilm']);
    Route::any('edit-episode', 'AdminController@editEpisode');
    Route::any('new-episode', 'AdminController@newEpisode');
});
