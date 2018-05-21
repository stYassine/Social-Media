<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Photo extends Model
{
    
    protected $fillable =[
        'user_id', 'category_id', 'is_active', 'title', 'path'
    ];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function likes(){
        return $this->hasMany('App\Like');
    }
    
    public function is_liked_by_auth(){
        
        $auth_user_id =Auth::id();
        
        $likers =array();
        
        foreach($this->likes as $like){
            array_push($likes, $like->user_id);
        }
        
        if(in_array($auth_user_id, $likers)){
            return true;
        }else{
            return false;
        }
        
    }
    
}
