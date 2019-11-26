<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome2');
});



Route::resource('ventas/cliente','ClienteController');
Route::resource('ventas/client','ClientController');
Route::resource('almacen/usuario','UsuarioController');
Route::resource('compras/compra','CompraController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('almacen/producto','ProductoController');
Route::resource('ventas/venta','VentaController');
Route::resource('ventas/detalleventa','DetalleVentaController');
Route::resource('compras/detallecompra','DetalleCompraController');
Route::resource('almacen/product','ProductController');

/*RUTAS DE FACTURADOR*/

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/invoice', 'InvoiceController@index');
Route::get('/invoice/add', 'InvoiceController@add');
Route::get('/invoice/detail/{id}', 'InvoiceController@detail');
Route::get('/invoice/pdf/{id}', 'InvoiceController@pdf');
Route::get('/invoice/findClient', 'InvoiceController@findClient');
Route::get('/invoice/findProduct', 'InvoiceController@findProduct');
Route::post('/invoice/save', 'InvoiceController@save');