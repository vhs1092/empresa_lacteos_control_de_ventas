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

    Route::get('user/changeStatus/{user}/{status}', ['as'=>'user.changeStatus', 'uses'=> 'UsersController@changeStatus']);

    Route::resource('user', 'UsersController');
    /* End - Users */
       Route::get('producto/changeStatus/{producto}/{status}', ['as'=>'producto.changeStatus', 'uses'=> 'ProductoController@changeStatus']);

       Route::resource('tipo_producto', 'TipoProductoController');
       Route::resource('producto', 'ProductoController');
	/* Cliente */
      Route::get('cliente/changeStatus/{cliente}/{status}', ['as'=>'cliente.changeStatus', 'uses'=> 'ClienteController@changeStatus']);

       Route::resource('cliente', 'ClienteController');
    /* Tipo Transacciones */
           Route::get('tipo_transaccion/changeStatus/{tipo_transaccion}/{status}', ['as'=>'tipo_transaccion.changeStatus', 'uses'=> 'TipoTransaccionController@changeStatus']);

           Route::resource('tipo_transaccion','TipoTransaccionController');
    /* Transacciones */
           
           Route::get('transaccion/transaccion_get_clientes','TransaccionController@get_clientes');
           Route::get('transaccion/transaccion_get_productos','TransaccionController@get_productos');
           Route::get('transaccion/transaccion_detail', ['as'=>'transaccion.detail', 'uses'=> 'TransaccionController@detail']);
           Route::post('transaccion/transaccion_save','TransaccionController@save');
           Route::post('transaccion/transaccion_get_tipo','TransaccionController@get_tipotransaccion');

           Route::resource('transaccion','TransaccionController');


});