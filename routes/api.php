<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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

Route::prefix('product')->group(function(){
    Route::post('', [ProductController::class, 'store']);
    Route::get('', [ProductController::class, 'index']);
    Route::get('all', function(){
        return response()->json([
            'products' => Product::latest()->get()
        ]); 
    });
    Route::post('search', [ProductController::class, 'search']);
    Route::get('search/{product}', [ProductController::class, 'showProduct']);
    Route::post('store', [CartController::class, 'store']);
    Route::get('count/{pesanan:pemesan}', [CartController::class, 'count']);
    Route::get('cart/{pesanan:pemesan}', [CartController::class, 'cart']);
    Route::delete('{pesananDetail}', [CartController::class, 'destroy']);
    Route::patch('{pesanan:pemesan}', [CartController::class, 'checkout']);
});
