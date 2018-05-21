<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    
    protected $fillables =[
        'profile_id', 'follower_id'
    ];
    
    public function users(){
        return $this->hasMany('App\User');
    }
    
    
    
}
