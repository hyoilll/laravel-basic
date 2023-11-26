<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});

// ::classをつけることで、完全修飾として認識され、TestControllerがApp\Http\Controllers\TestControllerとして認識される。
// Route::get("tests/test", [TestController::class, "index"]);
Route::get("tests/test", [TestController::class, "queryBuilder"]);