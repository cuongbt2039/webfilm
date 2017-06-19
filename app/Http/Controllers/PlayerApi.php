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
    use Illuminate\Http\Response;
    use \Illuminate\Http\Request;

    class PlayerApi extends Controller
    {

        public function __construct()
        {

        }

        public function getEpisode()
        {
            $userEpisode = UserEpisode::where('cookie_code', COOKIE_CODE)
                ->join('users', 'users.id', '=', 'user_episode.user_id')
                ->join('episodes', 'episodes.id', '=', 'user_episode.episode_id')
                ->orderBy('user_episode.updated_at', 'desc')
                ->distinct()
                ->limit(1)
                ->get(['episodes.video_id', 'user_episode.current_time']);
            if (count($userEpisode)) {
                $userEpisode['success'] = 1;
            } else {
                $userEpisode['success'] = 0;
                $userEpisode['video_id'] = 'x5r3shx';
            }
            echo json_encode($userEpisode);
        }

        public function postEpisode()
        {
            if (!defined('COOKIE_CODE') || empty(COOKIE_CODE)) {
                echo "error:no_cookie_code";
            } else {
                $episode_id = Input::get('episode_id');
                $episode = Episode::where('video_id', $episode_id)->first();
                $current_time = Input::get('time');
                $user = User::createUserFromCookie();
                $userEpisode = UserEpisode::where("episode_id", $episode->id)
                    ->where('user_id', $user->id)
                    ->first();
                if ($userEpisode) {
                    $userEpisode->current_time = $current_time;
                } else {
                    $userEpisode = new UserEpisode();
                    $userEpisode->episode_id = $episode->id;
                    $userEpisode->user_id = $user->id;
                    $userEpisode->current_time = $current_time;
                }
                $userEpisode->save();
            }
            echo COOKIE_CODE;
        }

        public function nextEpisode()
        {
            $id_current_episode = Input::get('episode_id');
            $episode_current = Episode::where('video_id', $id_current_episode)->first();
            if (empty($episode_current)) {
                return response('', 204);
            }
            $episode_next = Episode::where('number_episode', $episode_current->number_episode + 1)->first();
            if (empty($episode_next)) {
                return response('', 204);
            }

            return response($episode_next->number_episode, 200);
        }

        public function caculateTimeOnSide()
        {
            header('Content-Type: text/event-stream');
            header('Cache-Control: no-cache');

            $timeDif = time() - \Input::get('time_start');
            $result = json_encode(["time" => $timeDif, "isReg" => 1]);

            echo "data: $result\n\n";
            flush();
        }
    }
