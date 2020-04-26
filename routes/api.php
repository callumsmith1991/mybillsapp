<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/', 'BillsController@index');
    Route::post('/createamount', 'MonthlyIncomesController@store');
    Route::patch('/update/{monthly_income}', 'MonthlyIncomesController@update');

    // Route::get('/create', 'BillsController@create');
    Route::get('/edit/{bill}', 'BillsController@edit');

    Route::patch('/edit/{bill}', 'BillsController@update');
    // Route::delete('/edit/{bill}', 'BillsController@destroy');
    Route::post('/create', 'BillsController@store');

    Route::get('/delete/{bill}', 'BillsController@edit');
    Route::delete('/delete/{bill}', 'BillsController@destroy');


    
});
