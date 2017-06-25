<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Episode extends Model
    {

        protected $table = 'episodes';

        public function film()
        {
            return $this->belongsTo('App\Film', 'film_id');
        }

        public function userEpisode()
        {
            return $this->belongsToMany('App\UserEpisode');
        }

        public static function getListEpisode()
        {
            return  Episode::orderBy('number_episode')->pluck('video_id', 'number_episode')->all();
        }

        public static function getEpisode($id)
        {
            return Episode::where('number_episode', $id)->first();
        }
    }
