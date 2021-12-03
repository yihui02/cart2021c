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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addCategory', function () {
    return view('addCategory');
});

Route::get('/addProduct', function () {
    return view('addProduct',['categoryID'=>App\Models\Category::all()]);
});
Route::post('/addCategory/store',[App\Http\Controllers\CategoryController::class,'add'])->name('addCategory');

Route::post('/addProduct/store',[App\Http\Controllers\ProductController::class,'add'])->name('addProduct');

Route::get('/showCategory',[App\Http\Controllers\CategoryController::class,'view'])->name('showCategory');

Route::get('/showProduct',[App\Http\Controllers\ProductController::class,'view'])->name('showProduct');

Route::get('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('deleteProduct');

Route::get('editProduct/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('editProduct');
// http://localhost/editProduct.php?id=22   localhost/editProduct/22

Route::post('/updateProduct', [App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');