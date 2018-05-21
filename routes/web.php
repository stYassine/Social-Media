<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//////////////////////////////////////////////////////
/// Admin
//////////////////////////////////////////////////////
Route::group(['prefix' => 'dashboard'], function(){
    
    ///dashboard page
    Route::get('/', [
        'uses' => 'AdminController@dashboard',
        'as' => 'dashboard'
    ]);
    
    /////////////////////////////
    /// Users
    /////////////////////////////
    /// users page
    Route::get('/users', [
        'uses' => 'AdminController@usersPage',
        'as' => 'dashboard.users'
    ]);
    /// create users page
    Route::get('/users/create', [
        'uses' => 'AdminController@createUsersPage',
        'as' => 'dashboard.users.create'
    ]);
    /// create users
    Route::post('/users/create', [
        'uses' => 'AdminController@createUser',
        'as' => 'dashboard.users.create'
    ]);
    /// edit users page
    Route::get('/users/edit/{id}', [
        'uses' => 'AdminController@editUsersPage',
        'as' => 'dashboard.users.edit'
    ]);
    /// edit users
    Route::post('/users/edit/{id}', [
        'uses' => 'AdminController@editUser',
        'as' => 'dashboard.users.edit'
    ]);
    /// remove users
    Route::get('/users/remove/{id}', [
        'uses' => 'AdminController@deleteUser',
        'as' => 'dashboard.users.remove'
    ]);
    
    
    
    
    /////////////////////////////
    /// Articles
    /////////////////////////////
    /// articles page
    Route::get('/articles', [
        'uses' => 'AdminController@articlesPage',
        'as' => 'dashboard.articles'
    ]);
    /// create articles page
    Route::get('/articles/create', [
        'uses' => 'AdminController@createArticlesPage',
        'as' => 'dashboard.articles.create'
    ]);
    /// create articles
    Route::post('/articles/create', [
        'uses' => 'AdminController@createArticle',
        'as' => 'dashboard.articles.create'
    ]);
    /// edit articles page
    Route::get('/articles/edit/{id}', [
        'uses' => 'AdminController@editArticlesPage',
        'as' => 'dashboard.articles.edit'
    ]);
    /// remove articles
    Route::get('/articles/remove/{id}', [
        'uses' => 'AdminController@deleteArticle',
        'as' => 'dashboard.articles.remove'
    ]);
    
    
    /////////////////////////////
    /// Photos
    /////////////////////////////
    /// Photos page
    Route::get('/photos', [
        'uses' => 'AdminController@photosPage',
        'as' => 'dashboard.photos'
    ]);
    /// create Photos page
    Route::get('/photos/create', [
        'uses' => 'AdminController@createPhotosPage',
        'as' => 'dashboard.photos.create'
    ]);
    /// edit Photos page
    Route::get('/photos/edit/{id}', [
        'uses' => 'AdminController@editPhotosPage',
        'as' => 'dashboard.photos.edit'
    ]);
    /// edit Photos page
    Route::post('/photos/edit/{id}', [
        'uses' => 'AdminController@editPhoto',
        'as' => 'dashboard.photos.edit'
    ]);
    /// remove Photos
    Route::get('/photos/remove/{id}', [
        'uses' => 'AdminController@deletePhoto',
        'as' => 'dashboard.photos.remove'
    ]);
    
    
    /////////////////////////////
    /// Comments
    /////////////////////////////
    /// comments page
    Route::get('/comments', [
        'uses' => 'AdminController@CommentsPage',
        'as' => 'dashboard.comments'
    ]);
    /// create comments page
    Route::get('/comments/create', [
        'uses' => 'AdminController@createCommentsPage',
        'as' => 'dashboard.comments.create'
    ]);
    /// create comments
    Route::post('/comments/create', [
        'uses' => 'AdminController@createComment',
        'as' => 'dashboard.comments.create'
    ]);
    /// edit comments page
    Route::get('/comments/edit/{id}', [
        'uses' => 'AdminController@editCommentsPage',
        'as' => 'dashboard.comments.edit'
    ]);
    /// edit comments
    Route::post('/comments/edit/{id}', [
        'uses' => 'AdminController@editComment',
        'as' => 'dashboard.comments.edit'
    ]);
    /// remove Photos
    Route::get('/comments/remove/{id}', [
        'uses' => 'AdminController@deleteComment',
        'as' => 'dashboard.comments.remove'
    ]);
    
    

    /////////////////////////////
    /// Likes
    /////////////////////////////
    /// likes page
    Route::get('/likes', [
        'uses' => 'AdminController@likesPage',
        'as' => 'dashboard.likes'
    ]);
    /// create likes page
    Route::get('/likes/create', [
        'uses' => 'AdminController@createLikesPage',
        'as' => 'dashboard.likes.create'
    ]);
    /// create likes
    Route::post('/likes/create', [
        'uses' => 'AdminController@createLike',
        'as' => 'likes.create'
    ]);
    /// edit likes page
    Route::get('/likes/edit/{id}', [
        'uses' => 'AdminController@editLikesPage',
        'as' => 'dashboard.likes.edit'
    ]);
    /// edit likes
    Route::post('/likes/edit/{id}', [
        'uses' => 'AdminController@editLikes',
        'as' => 'dashboard.likes.edit'
    ]);
    /// remove likes
    Route::post('/likes/remove', [
        'uses' => 'AdminController@deleteLikes',
        'as' => 'likes.remove'
    ]);

    /// get posts by type id
    Route::post('/posts/type', [
        'uses' => 'AdminController@getPostByType',
        'as' => 'post.type'
    ]);


    
    
    /////////////////////////////
    /// Followers
    /////////////////////////////
    /// followers page
    Route::get('/followers', [
        'uses' => 'AdminController@followersPage',
        'as' => 'dashboard.followers'
    ]);
    
    
    
    
    
});









//////////////////////////////////////////////////////
/// Public
//////////////////////////////////////////////////////

/// index page
Route::get('/', [
    'uses' => 'FrontController@index',
    'as' => 'index'
]);
/// wall page
Route::get('/wall', [
    'uses' => 'FrontController@wall',
    'as' => 'wall'
]);
/// users page
Route::get('/users', [
    'uses' => 'FrontController@users',
    'as' => 'users'
]);


/// posts by category page
Route::get('/category/{id}', [
    'uses' => 'FrontController@categoryPage',
    'as' => 'category'
]);
/// articles only page
Route::get('/articles', [
    'uses' => 'FrontController@articlesPage',
    'as' => 'articles'
]);
/// photos only page
Route::get('/photos', [
    'uses' => 'FrontController@photosPage',
    'as' => 'photos'
]);
/// videos only page
Route::get('/videos/{id}', [
    'uses' => 'FrontController@videosPage',
    'as' => 'videos'
]);


/// single post page
Route::get('/single/{type}/{id}', [
    'uses' => 'FrontController@single',
    'as' => 'single'
]);

/// profile page
Route::get('/profile/{id}', [
    'uses' => 'FrontController@profile',
    'as' => 'profile'
]);
/// follow
Route::get('/follow/{id}', [
    'uses' => 'FrontController@follow',
    'as' => 'follow'
]);
/// unfollow
Route::get('/unfollow/{id}', [
    'uses' => 'FrontController@unfollow',
    'as' => 'unfollow'
]);
/// send message
Route::post('/message', [
    'uses' => 'FrontController@sendMessage',
    'as' => 'message'
]);



/// upload photo
Route::get('/profile/upload/image', [
    'uses' => 'ProfileController@uploadImagesView',
    'as' => 'profile.uploadImagesView'
]);

/// profile articles
Route::get('/profile/{id}/articles', [
    'uses' => 'FrontController@profileArticles',
    'as' => 'profile.articles'
]);
/// profile photos
Route::get('/profile/{id}/photos', [
    'uses' => 'FrontController@profilePhotos',
    'as' => 'profile.photos'
]);
