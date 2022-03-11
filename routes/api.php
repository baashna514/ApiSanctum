<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('get-customers', [ApiController::class, 'getCustomers']);
    Route::post('add-customer', [ApiController::class, 'addCustomer']);

});

Route::post('login-user', [ApiController::class, 'checkLoginCredentials']);
