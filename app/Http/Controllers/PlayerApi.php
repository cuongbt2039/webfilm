<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\User;
use App\UserEpisode;
use App\Episode;

class PlayerApi extends Controller {

    public function __construct() {
        
    }

    public function getEpisode() {
        $userEpisode = UserEpisode::where('cookie_code', COOKIE_CODE)
                ->join('users', 'users.id', '=', 'user_espisode.user_id')
                ->join('episodes', 'episodes.id', '=', 'user_espisode.episode_id')
                ->orderBy('user_espisode.updated_at', 'desc')
                ->distinct()
                ->limit(1)
                ->get(['episodes.youtube_id', 'user_espisode.current_time']);
        if(count($userEpisode)){
            $userEpisode['success'] = 1;
        }else{
            $userEpisode['success'] = 0;
            $userEpisode['youtube_id'] = 'x5hu6co';
        }
        echo json_encode($userEpisode);
    }

    public function postEpisode() {
        if (!defined('COOKIE_CODE') || empty(COOKIE_CODE)) {
            echo "error:no_cookie_code";
        } else {
            $episode_id = Input::get('episode_id');
            $episode = Episode::where('youtube_id', $episode_id)->first();
            $current_time = Input::get('time');
            $user = User::createUserFromCookie();
            $userEpisode = UserEpisode::where("episode_id", $episode->id)
                    ->where('user_id', $user->id)
                    ->first();
            if($userEpisode){
                $userEpisode->current_time = $current_time;
            }else{
                $userEpisode = new UserEpisode();
                $userEpisode->episode_id = $episode->id;
                $userEpisode->user_id = $user->id;
                $userEpisode->current_time = $current_time;
            }
            $userEpisode->save();
        }
        echo COOKIE_CODE;
    }

    public function putEpisode() {
        
    }

}
