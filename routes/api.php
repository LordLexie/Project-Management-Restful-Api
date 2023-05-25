<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('users', 'UserController')->middleware('auth:sanctum');
    Route::apiResource('roles', 'RoleController')->middleware('auth:sanctum');
    Route::apiResource('projects', 'ProjectController')->middleware('auth:sanctum');
    Route::apiResource('customers', 'CustomerController')->middleware('auth:sanctum');
    Route::apiResource('requisitions', 'RequisitionController')->middleware('auth:sanctum');   
    Route::apiResource('permissions', 'PermissionController')->middleware('auth:sanctum');    
    Route::apiResource('role_permission', 'RolePermissionController')->middleware('auth:sanctum');      
    Route::post('logout', 'LoginController@logout')->middleware('auth:sanctum');
    Route::post('login', 'LoginController@login');
}); 
