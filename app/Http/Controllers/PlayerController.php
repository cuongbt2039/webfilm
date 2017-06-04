<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\User;
    use App\UserEpisode;
    use App\Episode;

    class PlayerController extends Controller
    {

        private $latest_episode = '';
        private $current_time_latest_episode = '';

        public function __construct()
        {
        }

        public function index()
        {
            $isPlayByEpisode = FALSE;
            $cookie_code = COOKIE_CODE;
            $list_episode = Episode::pluck('video_id', 'number_episode')->all();

            return view('player.index', compact('cookie_code', 'list_episode', 'isPlayByEpisode'));
        }

        public function play($episodeId)
        {
            $currentTime = 0;
            $videoId = $episodeId;
            $isPlayByEpisode = TRUE;
            $cookie_code = COOKIE_CODE;
            $list_episode = Episode::getListEpisode();
            $episode = UserEpisode::getEpisode($episodeId);
            if (empty($episode)) {
                $episode = Episode::getEpisode($episodeId);
                if (empty($episode)) {
                    return abort(404);
                }
            } else {
                $currentTime = $episode->current_time;
                $videoId = $episode->video_id;
            }
            $divide = round($episodeId / NUMBER_SLIDE_SHOW_EPISOE, 0);
            $currentSlide = $divide != 0 ? $divide - 1: $divide - 2;

            return view('player.play', compact('currentSlide','videoId', 'cookie_code', 'list_episode', 'isPlayByEpisode', 'currentTime'));
        }

    }
