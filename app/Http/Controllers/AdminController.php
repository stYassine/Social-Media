<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Article;
use App\Category;
use App\Comment;
use App\Photo;
use App\Like;

use Session;
use File;


class AdminController extends Controller
{
    
    
    public function dashboard(){
        
        $users_count =User::all()->count();
        $articles_count =Article::all()->count();
        $photos_count =Photo::all()->count();
        $comments_count =Comment::all()->count();
        
        return view('admin.dashboard')->with([
            'users_count' => $users_count,
            'articles_count' => $articles_count,
            'photos_count' => $photos_count,
            'comments_count' => $comments_count
        ]);
        
    }
    
    
    /* Users
        =========================== */
    public function usersPage(){
        
        $users =User::all();
        
        return view('admin.users.index')->with('users', $users);
    }
    
    public function createUsersPage(){
        
        $roles =Role::all();
        
        return view('admin.users.create')->with('roles', $roles);
        
    }
    
    public function createUser(Request $request){
        
        $this->validate($request, [
            'role_id' => 'required|integer',
            'is_active' => 'required|integer',
            'name' => 'required|min:2|max:66',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        $user =new User;
        $user->role_id =$request->role_id;
        $user->is_active =$request->is_active;
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        
        $user->save();
        
        Session::flash('user_created', 'User Created Successfully');
        
        return redirect()->back();
        
    }
    
    public function editUsersPage($id){
        
        $user =User::find($id);
        $roles =Role::all();
        
        return view('admin.users.edit')->with([
            'user' =>  $user,
            'roles' =>  $roles
        ]);
        
    }
    
    public function editUser(Request $request, $id){
        
        $this->validate($request, [
            'role_id' => 'required|integer',
            'is_active' => 'required|integer',
            'name' => 'required|min:2|max:66',
            'email' => 'required|email',
        ]);
        
        $user =User::find($id);
        $user->role_id =$request->role_id;
        $user->is_active =$request->is_active;
        $user->name =$request->name;
        $user->email =$request->email;
        
        if($request->has('password')){
            $user->password =bcrypt($request->password);
        }
        
        $user->save();
        
        Session::flash('user_updated', 'User Updated Successfully');
        
        return redirect()->back();
        
    }
    
    public function deleteUser($id){
        
        $user =User::find($id);
        $user->delete();
        
        Session::flash('user_deleted', 'User Deleted Successfully');
        
        return redirect()->back();
        
    }
    
    
    
    
    
    /* Articles
        =========================== */
    public function articlesPage(){
        
        $articles =Article::all();
        
        return view('admin.articles.index')->with('articles', $articles);
    }
    
    public function createArticlesPage(){
        
        $categories =Category::all();
        $users =User::all();
        
        return view('admin.articles.create')->with([
            'categories' => $categories,
            'users' => $users
        ]);
        
    }
    
    public function createArticle(Request $request){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'is_active' => 'required|integer',
            'title' => 'required|min:2|max:66',
            'body' => 'required|min:2'
        ]);
        
        $user =new Article;
        $user->user_id =$request->user_id;
        $user->category_id =$request->category_id;
        $user->is_active =$request->is_active;
        $user->title =$request->title;
        $user->body =$request->body;
        
        $user->save();
        
        Session::flash('article_created', 'Article Created Successfully');
        
        return redirect()->back();
        
    }
    
    public function editArticlesPage($id){
        
        $article =Article::find($id);
        $users =User::all();
        $roles =Role::all();
        
        return view('admin.articles.edit')->with([
            'article' =>  $article,
            'users' =>  $users,
            'roles' =>  $roles
        ]);
        
    }
    
    public function editArticle(Request $request, $id){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'is_active' => 'required|integer',
            'title' => 'required|min:2|max:66',
            'body' => 'required|min:2'
        ]);
        
        $user =Article::find($id);
        $user->user_id =$request->user_id;
        $user->category_id =$request->category_id;
        $user->is_active =$request->is_active;
        $user->title =$request->title;
        $user->body =$request->body;
        
        $user->save();
        
        Session::flash('article_updated', 'Article Updated Successfully');
        
        return redirect()->back();
        
    }
    
    public function deleteArticle($id){
        
        $user =Article::find($id);
        $user->delete();
        
        Session::flash('article_deleted', 'Article Deleted Successfully');
        
        return redirect()->back();
    }
    
    
    
    
    
    /* Photos
        =========================== */
    public function photosPage(){
        
        $photos =Photo::all();
        
        return view('admin.photos.index')->with([
            'photos' => $photos
        ]);
    }
    
    public function createPhotosPage(){
        
        $categories =Category::all();
        $users =User::all();
        
        return view('admin.articles.create')->with([
            'categories' => $categories,
            'users' => $users
        ]);
        
    }
    
    public function createPhoto(Request $request){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'is_active' => 'required|integer',
            'title' => 'required|min:2|max:125',
            'image' => 'required'
        ]);
        
        $image =$request->file('image');
        $image_name =time().$image->getClientOriginalName();
        $image->move('uploads/photos', $image_name);
        
        $photo =new Photo;
        $photo->user_id =$request->user_id;
        $photo->category_id =$request->category_id;
        $photo->is_active =$request->is_active;
        $photo->title =$request->title;
        $photo->path ='uploads/photos/'.$image_name;
        
        $user->save();
        
        Session::flash('photo_created', 'Photo Created Successfully');
        
        return redirect()->back();
        
    }
    
    public function editPhotosPage($id){
        
        $photo =Photo::find($id);
        $users =User::all();
        $categories =Category::all();
        
        return view('admin.photos.edit')->with([
            'photo' =>  $photo,
            'users' =>  $users,
            'categories' =>  $categories
        ]);
        
    }
    
    public function editPhoto(Request $request, $id){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'is_active' => 'required|integer',
            'title' => 'required|min:2|max:125'
        ]);
        
        
        $photo =Photo::find($id);
        $photo->user_id =$request->user_id;
        $photo->category_id =$request->category_id;
        $photo->is_active =$request->is_active;
        $photo->title =$request->title;
        if($reques->has('image')){
         
            $image =$request->file('image');
            $image_name =time().$image->getClientOriginalName();
            $image->move('uploads/photos', $image_name);
            
            $photo->path ='uploads/photos/'.$image_name;
        }
        
        
        $user->save();
        
        Session::flash('photo_updated', 'Photo Updated Successfully');
        
        return redirect()->back();
        
    }
    
    public function deletePhoto($id){
        
        $photo =Photo::find($id);
        File::delete($photo->path);
        $photo->delete();
        
        Session::flash('photo_deleted', 'Photo Deleted Successfully');
        
        return redirect()->back();
    }
    
    
    
    /* Comments
        =========================== */
    public function CommentsPage(){
        
        $comments =Comment::all();
        
        return view('admin.comments.index')->with([
            'comments' => $comments
        ]);
        
    }
    
    public function createCommentsPage(){
        
        $categories =Category::all();
        $articles =Article::all();
        $users =User::all();
        
        return view('admin.comments.create')->with([
            'categories' => $categories,
            'users' => $users,
            'articles' => $articles
        ]);
        
    }
    
    public function createComment(Request $request){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'is_active' => 'required|integer',
            'post_type_id' => 'required|integer',
            'post_id' => 'required|integer',
            'body' => 'required|min:2'
        ]);

        
        $comment =new Comment;
        $comment->user_id =$request->user_id;
        $comment->category_id =$request->category_id;
        $comment->post_type_id =$request->post_type_id;
        $comment->is_active =$request->is_active;
        $comment->title =$request->title;
        $comment->body =$request->body;
        
        $user->save();
        
        Session::flash('comment_created', 'Comment Created Successfully');
        
        return redirect()->back();
        
    }
    
    public function editCommentsPage($id){
        
        $comment =Comment::find($id);
        
        $posts =array();
        
        $articles =Article::all();
        $photos =Photo::all();
        
        $users =User::all();
        $categories =Category::all();
        
        if($comment->post_type_id == 1){
            $posts =$articles;
        }else if($comment->post_type_id == 2){
            $posts =$photos;
        }
        
        
        return view('admin.comments.edit')->with([
            'comment' =>  $comment,
            'users' =>  $users,
            'categories' =>  $categories,
            'posts' =>  $posts
        ]);
        
        
    }
    
    public function editComment(Request $request, $id){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'is_active' => 'required|integer',
            'post_type_id' => 'required|integer',
            'post_id' => 'required|integer',
            'body' => 'required|min:2'
        ]);
        
        
        $comment =Comment::find($id);
        $comment->user_id =$request->user_id;
        $comment->category_id =$request->category_id;
        $comment->is_active =$request->is_active;
        $comment->post_type_id =$request->post_type_id;
        $comment->title =$request->title;
        
        
        $user->save();
        
        Session::flash('comment_updated', 'Comment Updated Successfully');
        
        return redirect()->back();
        
    }
    
    public function deleteComment($id){
        
        $comment =Comment::find($id);
        $comment->delete();
        
        Session::flash('comment_deleted', 'Comment Deleted Successfully');
        
        return redirect()->back();
    }
    
    
    
    /* Likes
        =========================== */
    public function likesPage(){
        
        $likes =Like::all();
        
        return view('admin.likes.index')->with([
            'likes' => $likes
        ]);
        
    }
    
    public function createLikesPage(){
        
        
        $users =User::all();
        $articles =Article::all();
        $photos =Photo::all();
        
        
        return view('admin.likes.create')->with([
            'users' => $users,
            'articles' => $articles,
            'photos' => $photos
        ]);
        
    }
    /// get post bu pot type
    public function getPostByType(Request $request){
        
        /*$post_type =$id;*/
        return $request;
        
        if($post_type == 1){
            return Response::json(Article::all());
        }else if($post_type == 2){
            return Response::json(Photo::all());
        }
        
    }
    
    
    
    public function createLike(Request $request){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'post_id' => 'required|integer',
            'post_type_id' => 'required|integer'
        ]);
        
        
        $like =new Like;
        $like->user_id =$request->user_id;
        $like->post_id =$request->post_id;
        $like->post_type_id =$request->post_type_id;
        $like->save();
        
        Session::flash('like_created', 'Like Created Successfully');
        
        return redirect()->back();
        
    }
    

    public function editLikesPage($id){
        
        $like =Like::find($id);
        
        return view('admin.likes.edit')->with([
            'like' =>  $like
        ]);
        
    }
    
    public function editLikes(Request $request, $id){
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'post_id' => 'required|integer',
            'post_type_id' => 'required|integer'
        ]);
        
        
        $like =Like::find($id);
        $like->user_id =$request->user_id;
        $like->post_id =$request->category_id;
        $like->post_type_id =$request->post_type_id;
        
        $like->save();
        
        Session::flash('like_updated', 'Like Updated Successfully');
        
        return redirect()->back();
        
    }
    
    public function deleteLikes(Request $request){
        
        $like =Like::where('user_id', $request->user_id)->where('post_id', $request->post_id)->where('post_type_id',  $request->post_type_id)->first();
        $like->delete();
        
        Session::flash('like_deleted', 'Like Deleted Successfully');
        
        return redirect()->back();
    }
    
    
    
    
    
    




        
        
    
    
    
    /* Followers
        =========================== */
    public function followersPage(){
        
        
        /* TODO 
            followers page
        */
        
    }
    
    
    
    
    
}
