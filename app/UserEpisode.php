<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class UserEpisode extends Model
    {

        protected $table = 'user_episode';

        public function episodes()
        {
            return $this->belongsToMany('App\Episode');
        }

        public function users()
        {
            return $this->belongsToMany('App\User');
        }

        public static function getEpisode($episodeId)
        {
            $episode = UserEpisode::where('episode_id', $episodeId)
                ->join('episodes', 'episodes.id', '=', 'user_episode.episode_id')
                ->first();
            return $episode;
        }
    }
