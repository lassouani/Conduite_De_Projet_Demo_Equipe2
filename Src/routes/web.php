<?php

use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm');


Route::get('/home', 'HomeController@index');

//Facebook
Route::get('auth/facebook', 'FacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');

//GitHub
Route::get('auth/github', 'GithubController@redirectToProvider');
Route::get('auth/github/callback', 'GithubController@handleProviderCallback');



Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('search/redirect',function(){
      $search=urlencode(e(Input::get('search')));
      if($search){
      $route="search/project/$search";
      return redirect($route);
  }else {
   return redirect('home');
  }
});

Route::get("search/project/{search}", 'HomeController@search');
