<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    
    public function role(){
        return $this->belongsTo('App\Role');
    }
    
    public function photos(){
        return $this->hasMany('App\Photo');
    }
    
    public function articles(){
        return $this->hasMany('App\Article');
    }
    
    public function followers(){
        return $this->hasMany('App\Followers');
    }
    
    public function messages(){
        return $this->hasMany('App\Message');
    }
    
    public function getFollowedPosts(){
        
        $auth_id =Auth::id();
        
        $followed_profiles =Followers::where();
        
    }
    
    
}
