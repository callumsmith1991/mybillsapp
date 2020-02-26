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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'BillsController@index');

// Route::resources('', 'BillsController');

Route::get('/create', 'BillsController@create');
Route::get('/edit/{bill}', 'BillsController@edit');

Route::patch('/edit/{bill}', 'BillsController@update');
Route::delete('/edit/{bill}', 'BillsController@destroy');
Route::post('/create', 'BillsController@store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
