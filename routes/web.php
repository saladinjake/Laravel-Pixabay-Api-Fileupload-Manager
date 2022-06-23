<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UploaderController;
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

Route::get('/', [FrontController::class, 'index']);
Route::get('image-list/create/new', [FrontController::class, 'create']);
Route::get('image-list/lists', [FrontController::class, 'viewAll']);
Route::post('image-list/upload/via/device', [UploaderController::class, 'uploadViaDevice']);
Route::post('image-list/apiupload', [UploaderController::class, 'uploadViaApi']);
Route::delete('/image-list/{id}/delete',[FrontController::class, 'delete']);
