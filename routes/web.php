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

Route::get('/', 'HomeController@index')->name('home');
Route::get('post/details/{id}','HomeController@details')->name('post.details');
Route::get('category/post/{id}','HomeController@category')->name('category');

Route::get('login','LoginController@index')->name('user.login');
Route::post('login','LoginController@login')->name('login');
Route::post('logout','LoginController@logout')->name('logout');

Route::middleware('auth')->group(function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('post','PostController');
    Route::resource('category','CategoryController');
    Route::resource('author','AuthorController');
    Route::resource('user','UserController');
    Route::resource('sociallink','SociallinkController');
    Route::resource('about','AboutController');
});

// featured update
//strtotime kaj kore na
//

