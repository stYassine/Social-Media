<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    
    protected $fillables =[
        'user_id', 'post_type_id', 'post_id'
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    
    
}
