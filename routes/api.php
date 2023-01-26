<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\FatoorahController;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::get('/', function () {
    return 'api';
});

Route::get('/pay/{name}/{email}/{order_id}/{total}/', [FatoorahController::class, 'payOrder'])->name('payForOrder');
Route::get('/callback', [FatoorahController::class, 'callback']);
Route::get('/error', [FatoorahController::class, 'error']);

Route::get('/products', [ProductController::class, 'getProducts']);
