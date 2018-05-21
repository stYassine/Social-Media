<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use Auth;
use File;



class ProfileController extends Controller
{
    
    
    ////////////////////////////////
    /// Articles
    ////////////////////////////////
    public function createArticleView(){
        return view('profile');
    }
    
    
    public function createArticle(Request $request){
        
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title' => 'required|min:2|max:150',
            'body' => 'required|min:2'
        ]);
        
        
        $article =new Article();
        $article->user_id =Auth::id();
        $article->category_id =$request->category_id;
        $article->is_active =0;
        $article->title =$request->title;
        $article->body =$request->body;
        $article->save();
        
        Session::flash('article_created', 'Article Created Successfully');
        
        return redirect()->back();
        
    }
    
    public function updateArticle(Request $request, $id){
        
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title' => 'required|min:2|max:150',
            'body' => 'required|min:2'
        ]);
        
        
        $article =Article::find($id);
        $article->category_id =$request->category_id;
        $article->title =$request->title;
        $article->body =$request->body;
        $article->save();
        
        Session::flash('article_updated', 'Article Updated Successfully');
        
        return redirect()->back();
        
    }
    
    public function removeArticle($id){
        
        $article =Article::find($id);
        $article->delete();
        
        Session::flash('article_deleted', 'Article Deleted Successfully');
        
        return redirect()->back();
        
    }
    
    
    
    
    
    
    
    
    ////////////////////////////////
    /// Photos
    ////////////////////////////////
    public function uploadImagesView(){
        return view('profile_upload_photo');
    }
    
    
    public function uploadImage(Request $request){
        
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title' => 'required|min:2|max:150'
        ]);
        
        $image =$request->file('photo');
        $image_name =time().$image->getClientOriginalName();
        $image->move('uploads/photos', $image_name);
        
        $photo =new Photo;
        $photo->user_id =Auth::id();
        $photo->is_active =0;
        $photo->category_id =$request->category_id;
        $photo->title =$request->title;
        $photo->path ='uploads/photos/'.$image_name; 
        $photo->save();
        
        Session::flash('photo_uploaded', 'Photo Uploaded Successfully');
        
        return redirect()->back();
        
    }
    
    
    public function updateImage(){
        
        
        
        
    }
    
    
    public function removeImage($id){
        
        $photo =Photo::find($id);
        File::remove($photo->path);
        $photo->delete();
        
         Session::flash('photo_deleted', 'Photo Deleted Successfully');
        
        return redirect()->back();
        
    }
    
    
    
    
    ////////////////////////////////
    /// Videos
    ////////////////////////////////
    
    
    
    
}
