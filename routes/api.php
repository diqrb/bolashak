<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminTestController;

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

Route::get('index', [MainController::class, 'index']);
Route::post('feedback', [MainController::class, 'feedback']);

Route::get('test/categories', [TestController::class, 'categories']);
Route::get('test', [TestController::class, 'tests']);
Route::post('test', [TestController::class, 'results']);

Route::post('admin/test', [AdminTestController::class, 'create']);
Route::post('admin/test/{id}', [AdminTestController::class, 'update']);



Route::post('user', [TestController::class, 'user']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
