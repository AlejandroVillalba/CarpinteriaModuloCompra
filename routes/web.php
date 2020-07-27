<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('usuarios', 'UserController')->middleware('auth');
Route::resource('roles', 'RoleController')->middleware('auth');

Route::resource('proveedor', 'ProveedorController');
Route::get('/pdfproveedor', 'PDFController@PDFProveedor')->name('reportePDF');
