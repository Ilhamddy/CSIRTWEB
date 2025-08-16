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

// Agenda
Route::get('/agenda', [\App\Http\Controllers\AgendaController::class, 'index'])->name('front.agenda.index');
// Profile
Route::get('/visi-misi', [\App\Http\Controllers\ProfileController::class, 'visimisi'])->name('front.visi-misi.index');
Route::get('/struktur-organisasi', [\App\Http\Controllers\ProfileController::class, 'strukturOrganisasi'])->name('front.struktur-organisasi.index');
Route::get('/tupoksi', [\App\Http\Controllers\ProfileController::class, 'tupoksi'])->name('front.tupoksi.index');
// Gallery
Route::get('/foto', [\App\Http\Controllers\GalleryController::class, 'foto'])->name('front.gallery.foto');
Route::get('/video', [\App\Http\Controllers\GalleryController::class, 'video'])->name('front.gallery.video');
// Layanan
Route::get('/layanan', [\App\Http\Controllers\LayananController::class, 'index'])->name('front.layanan.index');
Route::get('/layanan/{slug}', [\App\Http\Controllers\LayananController::class, 'show'])->name('front.layanan.show');
// Contact
Route::get('/kontak', [\App\Http\Controllers\ContactController::class, 'index'])->name('front.contact.index');

// Auth Routes
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
    // Slider Routes
    Route::resource('/slider', \App\Http\Controllers\Admin\SliderController::class);
    // Agenda Routes
    Route::resource('/agenda', \App\Http\Controllers\Admin\AgendaController::class);
    // Route Layanan
    Route::resource('/layanan', \App\Http\Controllers\Admin\LayananController::class);
    // Profile Routes
    Route::resource('/pengaturan/profile', \App\Http\Controllers\Admin\ProfileController::class)->only(['index',  'update', 'store']);
    // Contact Routes
    Route::resource('/pengaturan/contact', \App\Http\Controllers\Admin\ContactController::class)->only(['index',  'store']);
});

Route::post('/summernote-upload', [App\Http\Controllers\SummernoteController::class, 'upload'])->name('summernote.upload');

Route::get('/getChatTele', [ApiOrderController::class, 'getChatId']);
