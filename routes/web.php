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


Auth::routes();

Route::get('/', function () {
    return redirect()->guest('login');
});

/*Route::get('/', function () {
    return view('admin/dashboard');
});*/

Route::group(['middleware' => 'auth'], function() {

Route::get('/home', 'HomeController@index')->name('home');

    /* - Users  */
    
    Route::get('user/resetPassword/{uuid}', ['as'=>'user.resetPassword', 'uses'=> 'UsersController@resetPassword']);
    Route::resource('user', 'UsersController');
    /* End - Users */


});