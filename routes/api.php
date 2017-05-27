<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('api/player/post', 'PlayerApi@postEpisode')->middleware('api');
Route::get('api/player/get', 'PlayerApi@getEpisode')->middleware('api');
Route::get('api/player/next', 'PlayerApi@nextEpisode')->middleware('api');