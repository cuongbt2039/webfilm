<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserEpisode;
use App\Episode;

class PlayerController extends Controller {

    private $latest_episode = '';
    private $current_time_latest_episode = '';
    
    public function __construct() {
        
    }

    public function index() {
        $cookie_code = COOKIE_CODE;
        $list_episode = Episode::pluck('youtube_id')->all();
        return view('player.index', compact('cookie_code', 'list_episode'));
    }

}
