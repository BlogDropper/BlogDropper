<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    //Dashboard and Admin Backend
    Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::post('/superadminupdate/update/{id}', 'App\Http\Controllers\ProfileController@update')->name('superadmin.update');
    Route::get('/settings','App\Http\Controllers\ProfileController@settings')->name('settings');
    Route::get('/maintenance-mode/toggle', 'App\Http\Controllers\ProfileController@toggle')->name('maintenance.toggle');
	Route::get('profile','App\Http\Controllers\ProfileController@edit')->name('profile.edit');

    //Posts Backend
    Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts.backend');
    Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('posts.store');
    Route::get('/posts/edit/{id}', 'App\Http\Controllers\PostController@edit')->name('posts.edit');
    Route::get('/posts/changeStatus/{id}/{status}','App\Http\Controllers\PostController@changeStatus')->name('posts.changeStatus'); //For status toggle
    Route::get('/posts/changeFeatured/{id}/{featured}','App\Http\Controllers\PostController@changeFeatured')->name('posts.changeFeatured'); //For featured toggle
    Route::get('/posts/changeCarousel/{id}/{carousel}','App\Http\Controllers\PostController@changeCarousel')->name('posts.changeCarousel'); //For Carousel toggle
    Route::post('/posts/update/{id}', 'App\Http\Controllers\PostController@update')->name('posts.update');
    Route::get('/posts/delete/{id}', 'App\Http\Controllers\PostController@delete')->name('posts.delete');

    //Categories Backend
    Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('cat.index');
    Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('cat.store');
    Route::get('/cat/changeStatus/{id}/{status}','App\Http\Controllers\CategoryController@changeStatus')->name('cat.changeStatus'); //For status toggle
    Route::get('/cat/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('cat.edit');
    Route::post('/cat/update/{id}', 'App\Http\Controllers\CategoryController@update')->name('cat.update');
    Route::get('/cat/delete/{id}', 'App\Http\Controllers\CategoryController@delete')->name('cat.delete');

    //WebUsers Backend
    Route::get('/webusershow', 'App\Http\Controllers\WebuserController@index')->name('webusershow.index');
    Route::get('/webusershow/edit/{id}','App\Http\Controllers\WebuserController@edit')->name('webusershow.edit');
    Route::post('/webusershow/update/{id}', 'App\Http\Controllers\WebuserController@update')->name('webusershow.update');
    Route::get('/webusershow/delete/{id}', 'App\Http\Controllers\WebuserController@delete')->name('webusershow.delete');

    //Backend for Comment Section
    Route::get('/showcomments', 'App\Http\Controllers\CommentsController@index')->name('showcomments.index');
    Route::get('/showcomments/edit/{id}','App\Http\Controllers\CommentsController@edit')->name('showcomments.edit');
    Route::post('/showcomments/update/{id}', 'App\Http\Controllers\CommentsController@update')->name('showcomments.update');
    Route::get('/showcomments/delete/{id}', 'App\Http\Controllers\CommentsController@delete')->name('showcomments.delete');
});

//Frontend Section
Route::get('/', 'App\Http\Controllers\FrontendController@index')->name('frontend.index'); //home page
Route::get('/about', 'App\Http\Controllers\FrontendController@about')->name('frontend.about'); //about page
Route::get('/blog/{id}','App\Http\Controllers\FrontendController@post')->name('frontend.post'); //indivisual blog page
Route::get('/blog/category/{category}','App\Http\Controllers\FrontendController@showcat')->name('frontend.showcat'); //category page
Route::get('/search', 'App\Http\Controllers\FrontendController@search')->name('frontend.search'); //For header Search

//To show more featured posts when show more is clicked using AJAX
Route::get('/showmoreposts','App\Http\Controllers\FrontendController@showmoreposts')->name('frontend.showmoreposts');
Route::get('/showmorepops','App\Http\Controllers\FrontendController@showmorepops')->name('frontend.showmorepops');

//For WebUser Authentication Frontend
Route::get('/signupwebuser','App\Http\Controllers\WebuserController@signup')->middleware('webauth')->name('frontend.signup');
Route::get('/webloginuser','App\Http\Controllers\WebuserController@login')->middleware('webauth')->name('frontend.login');
Route::post('/weblogin', 'App\Http\Controllers\WebuserController@signin')->middleware('webauth')->name('frontend.weblogin');
Route::post('/newwebloginuser','App\Http\Controllers\WebuserController@new')->middleware('webauth')->name('frontend.newwebuser');
Route::post('/logoutwebuser','App\Http\Controllers\WebuserController@logout')->name('frontend.userlogout');

//For Comments Frontend
Route::post('/commentstore','App\Http\Controllers\CommentsController@store')->middleware('webauthaccess')->name('comments.store');
Route::post('/nestedcommentstore','App\Http\Controllers\CommentsController@nestedstore')->middleware('webauthaccess')->name('nestedcomments.store');
Route::get('/comments/deletecommentbywebuser/{id}', 'App\Http\Controllers\CommentsController@deletecommentbywebuser')->middleware('webauthaccess')->name('deletecommentbywebuser.delete');
