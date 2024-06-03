<?php

use App\Http\Controllers\KcController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('staff/auth/callback', [KcController::class, 'authorizeLogin'])->name('authLogin');
Route::post('admin/auth/callback', [KcController::class, 'authorizeAdminLogin'])->name('adminLogin');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
