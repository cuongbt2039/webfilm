<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    const USER_TYPE = ['normal' => 'normal', 'admin' => 'admin'];

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userEpisode() {
        return $this->belongsToMany('App\UserEpisode');
    }

    public static function createUserFromCookie() {
        $user = User::where('cookie_code', COOKIE_CODE)->first();
        if (!$user) {
            $user = new User();
            $user->name = COOKIE_CODE;
            $user->email = COOKIE_CODE;
            $user->password = COOKIE_CODE;
            $user->type = self::USER_TYPE['normal'];
            $user->cookie_code = COOKIE_CODE;
            $user->type_account = 'cookie';
            $user->save();
        }
        return $user;
    }

    public function getUserFromCookie($cookie) {
        
    }

}
