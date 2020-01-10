<?php
use Auth;
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

Route::group(['middleware' => 'auth'], function(){

    Route::get('user', function(){
        return response()->json(Auth::user());
    });
    Route::get('articles', 'ArticleController@index');
    Route::get('delete-article/{id}', 'ArticleController@delete');
    Route::post('create-article','ArticleController@create');
    Route::put('update-article','ArticleController@update');
    
    Route::get('profile','UserController@profile')->name('profile');
    Route::get('users','UserController@index');
    Route::get('delete-user/{id}','UserController@delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
