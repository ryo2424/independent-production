<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});

Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
# 編集フォーム⇒UPDATE処理
Route::get('/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
// 削除機能
Route::delete('/Items/{Item}', [App\Http\Controllers\ItemController::class, 'destroy']);
//　画像アップロード
Route::post('/upload', [App\Http\Controllers\ItemController::class, 'addImage']);
