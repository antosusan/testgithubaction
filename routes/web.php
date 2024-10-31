<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FileController;


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

Route::get('/gmp', function () {
    return extension_loaded('gmp') ? 'OK' : 'NO';
});

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);

// testing upload file
Route::get('/upload', [FileController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [FileController::class, 'uploadFile'])->name('file.upload');
