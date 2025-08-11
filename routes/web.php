<?php

use App\Http\Controllers\Api\OrderController as ApiOrderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita-page');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita-detail');
Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');
// Route::get('/register', function () {
//     return view('pages.auth.register');
// })->name('register');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/user', UserController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/order', OrderController::class);
    Route::get('/order-detail/cetak/{id}', [OrderController::class, 'downloadPDF'])->name('print');
    Route::get('/export', [OrderController::class, 'exportExcel'])->name('order.export');

    // Posts Routes
    Route::resource('/posts', \App\Http\Controllers\PostsController::class);
    // Gallery Routes
    Route::resource('/gallery/foto', \App\Http\Controllers\Admin\FotoController::class);
    Route::resource('/gallery/video', \App\Http\Controllers\Admin\VideoController::class);
});

Route::post('/summernote-upload', [App\Http\Controllers\SummernoteController::class, 'upload'])->name('summernote.upload');

Route::get('/getChatTele', [ApiOrderController::class, 'getChatId']);
