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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::view('/test','test')->name('test');

Route::resource("category","CategoryController");
Route::resource("genre","GenreController");
Route::get("delete-post-genre/{post_id}/{genre_id}","PostController@deletePostGenre")->name("delete.post.genre");
Route::resource("quality","QualityController");
Route::resource("server","ServerController");
Route::resource("post","PostController")->middleware("auth");
Route::resource("photo","PhotoController");
Route::resource("download","DownloadController");
Route::resource("episode","EpisodeController");

Route::get("upload-post-photo/{id}","PhotoController@create")->name("upload-post-photo");
Route::get("upload-movie-download-link/{id}","DownloadController@create")->name("upload-movie-download-link");
Route::get("create-episode/{id}","EpisodeController@create")->name("create-episode");
//Route::post("upload-post-photo/{id}","PhotoController@create")->name("upload-post-photo");

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sample', 'HomeController@sample')->name('sample');
Route::get('/edit','ProfileController@edit')->name('profile.edit');
Route::post('/change-password','ProfileController@changePassword')->name('profile.changePassword');
Route::post('/change-name','ProfileController@changeName')->name('profile.changeName');
Route::post('/change-email','ProfileController@changeEmail')->name('profile.changeEmail');
Route::post('/change-photo','ProfileController@changePhoto')->name('profile.changePhoto');
