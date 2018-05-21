<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Category;
use App\Article;
use App\Photo;
use App\User;
use App\Comment;
use App\Like;
use App\Followers;
use App\Message;

use Auth;


class FrontController extends Controller
{
    
    /// Index Page
    public function index(){
        
        $categories =Category::all();
        $posts =array();
        
        
        $articles =Article::all();
        $photos =Photo::all();
        
        foreach($articles as $article){
            array_push($posts, $article);
        }
        foreach($photos as $photo){
            array_push($posts, $photo);
        }
        
        
        /*dd($post->title);*/
        
        
        return view('index')->with([
            'categories' => $categories,
            'posts' => $posts
        ]);
        
           
    }
    
    public function wall(){
        
        $categories =Category::all();
        
        $auth_id =Auth::id();
        
        $posts =array();
        $users =array();
        
        $following =Followers::where('follower_id', $auth_id)->get();
        
        foreach($following as $follow){
            array_push($users, User::find($follow->user_id));
        }
        foreach($users as $user){
            
            foreach($user->articles as $article){
                array_push($posts, $article);
            }
            
            foreach($user->photos as $photo){
                array_push($posts, $photo);
            }
            
        }
        
        return view('wall')->with([
            'posts' => $posts,
            'categories' => $categories
        ]);
        
        
    }
    
    public function users(){
        
        $users =User::all();
        $categories =Category::all();
        
        return view('users')->with([
            'users' => $users,
            'categories' => $categories
        ]);
        
    }
    
    
    public function single($type, $id){
        
        $auth_id =Auth::id();
        
        $post_type =$type;
        $post;
        $comments =Comment::where('post_type_id', $type)->where('post_id', $id)->get();
        
        $post_likes =Like::where('post_type_id', $type)->where('post_id', $id)->get();
        $is_post_liked_by_auth =false;
        
        
        if($type == 1){
            $article =Article::find($id);
            $post =$article;
            
        }else if($type == 2){
            $photo =Photo::find($id);
            $post =$photo;
        }
        
        if(isset($post_likes)){
            
            foreach($post_likes as $post_like){
                
                if(Auth::id() == $post_like->user_id){
                    $is_post_liked_by_auth =true;
                }else{
                    $is_post_liked_by_auth =false;
                }
                
            }
            
        }
        
        
        return view('single')->with([
            'post' => $post,
            'comments' => $comments,
            'post_likes' => $post_likes,
            'liked_by_auth' => $is_post_liked_by_auth
        ]);
        
    }
    
    
    public function categoryPage($id){
        
        $categories =Category::all();
        
        $posts =array();
        
        $articles =Article::where('category_id', $id)->get();
        $photos =Photo::where('category_id', $id)->get();
        
        foreach($articles as $article){
            array_push($posts, $article);
        }
        foreach($photos as $photo){
            array_push($posts, $photo);
        }
        
        return view('category')->with([
            'posts' => $posts,
            'categories' => $categories
        ]);
        
    }
    
    
    public function articlesPage(){
        
        $categories =Category::all();
        $articles =Article::all();
        
        return view('articlesPage')->with([
            'categories' => $categories,
            'articles' => $articles
        ]);
        
    }
    
    public function photosPage(){
        
        $categories =Category::all();
        $photos =Photo::all();
        
        return view('photosPage')->with([
            'categories' => $categories,
            'photos' => $photos
        ]);
        
    }
    
    public function videosPage(){
        
        return 'Videos Page';
        
    }
    
    
    
    
    public function profile($id){
        
        $auth_id =Auth::id();
        
        $user =User::find($id);
        $articles =Article::where('user_id', $id)->get();
        $photos =Photo::where('user_id', $id)->get();
        $auth_following_this_user =false;
        
        $messages =Message::where('user_id', $auth_id)->get();
        
        $followers =$user->followers;
        $followers_ids =array();
        $is_auth_following =false;
        
        foreach($followers as $follower){
            array_push($followers_ids, $follower->follower_id);
        }
        
        if(in_array($auth_id, $followers_ids)){
            $is_auth_following = true;
        }else{
            $is_auth_following = false;
        }
        
        
        return view('profile')->with([
            'user' => $user,
            'articles' => $articles,
            'photos' => $photos,
            'messages' => $messages,
            'is_auth_following' => $is_auth_following
        ]);
        
    }
    
    public function follow($id){
        
        $follower =new Followers;
        $follower->user_id =$id;
        $follower->follower_id =Auth::id();
        $follower->save();        
    
        Session::flash('follow_successfully', 'You Followed Successfully');
        
        return redirect()->back();
    }
    
    public function unfollow($id){
        
        $follower =Followers::where('user_id', $id)->where('', Auth::id())->first();
        $follower->delete();        
    
        Session::flash('unfollow_successfully', 'You UnFollowed Successfully');
        
        return redirect()->back();
    }
    
    public function sendMessage(Request $request){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'sender_id' => 'required|integer',
            'body' => 'required|min:1'
        ]);
        
        $message =new Message;
        $message->user_id =$request->user_id;
        $message->sender_id =$request->sender_id;
        $message->body =$request->body;
        $message->save(); 
            
        Session::flash('message_created', 'Message Created Successfully');
        
        return redirect()->back();
    }
    
    
    
    
    public function profileArticles($id){
        
        
        $categories =Category::all();
        
        $articles =Article::where('user_id', $id)->get();
        
        return view('articlesPage')->with([
            'categories' => $categories,
            'articles' => $articles
        ]);
        
    }
    
    public function profilePhotos($id){
        
        $categories =Category::all();
        
        $photos =Photo::where('user_id', $id)->get();
        
        return view('photosPage')->with([
            'categories' => $categories,
            'photos' => $photos
        ]);
        
    }
    
    
    
    
}
