<?php

use App\Http\middleware\CheckUserId;
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


Route::view('/signin','CampusGistSignIn');
Route::view('/showPost','CampusGistPost');
Route::view('/signup','CampusGistSignUp');
Route::view('/userComment','CampusGistUserComment');

Route::post('/SignUp','CampusGist@signup');
Route::post('/login','CampusGist@signin');
Route::get('/home','CampusGist@determineHomePage');
Route::any('/collectPost','CampusGist@saveUserPost');
Route::get('/displayPosts','CampusGist@displayBlogs');
Route::post('/postcomment','CampusGist@postComments')->middleware('userId');
Route::get('/myProfile','CampusGist@getUserProfile')->middleware('userId');
Route::post('/myProfilePostcomment','CampusGist@myProfilePostComments');

Route::view('/searchUser','CampusGistSearchUser')->middleware('userId');
Route::post('/findUser','CampusGist@searchForUser');
Route::get('/fullInformation','CampusGist@getFullInfo');
Route::post('/searchedPostComments','CampusGist@searchedProfilePostComments');

Route::get('/findCookie','CampusGist@getUserIdCookie');
Route::post('/fetchComment','CampusGist@fetchComments');
Route::post('/postViewComment','CampusGist@postViewComment');
//Route::get('/postViewComment','CampusGist@postViewComment');
Route::get('/comment','CampusGist@getPostId');
Route::get('/editProfile','CampusGist@editUserProfile');
Route::get('/logout','CampusGist@logOut');







