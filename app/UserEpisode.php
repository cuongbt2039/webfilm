<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEpisode extends Model {

    protected $table = 'user_espisode';

    public function episodes() {
        return $this->belongsToMany('App\Episode');
    }
    
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
