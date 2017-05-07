<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model {

    protected $table = 'episodes';

    public function film() {
        return $this->belongsTo('App\Film', 'film_id');
    }

    public function userEpisode() {
        return $this->belongsToMany('App\UserEpisode');
    }

}
