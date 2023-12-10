<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/tests/test", [TestController::class, "index"]);

// Route::resource("contacts", ContactFormController::class);

// name()をつけると、Route情報に名前を割り当てることです。この名前は、アプリケーションの他の場所でルートを参照する際に使用されます。
// Route::get("contacts", [ContactFormController::class, "index"])->name("contacts.index");
// 上のRoute情報をGroupingする。
Route::prefix("/contacts")->middleware(["auth"])->controller(ContactFormController::class)->name("contacts.")->group(function(){
    // middleware()　関数を利用することで、認証されたことが前提でこちらのrouteにアクセスできる。
    Route::get("/", "index")->name("index");
    Route::get("/create", "create")->name("create");
    Route::post("/", "store")->name("store");
    Route::get("/{id}", "show")->name("show");
    Route::get("/{id}/edit", "edit")->name("edit");
    Route::post("/{id}", "update")->name("update");
    Route::post("/{id}/destroy", "destroy")->name("destroy");
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
