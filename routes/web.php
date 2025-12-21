<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

// Halaman utama
Route::get('/', [PageController::class, 'index'])->name('home');

// Halaman statis
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/solusi', [PageController::class, 'solusi'])->name('solusi');

// Layanan detail
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/security', [PageController::class, 'security'])->name('security');
    Route::get('/office-service', [PageController::class, 'officeService'])->name('os');
    Route::get('/driver', [PageController::class, 'driver'])->name('driver');
    Route::get('/messenger', [PageController::class, 'messenger'])->name('messenger');
    Route::get('/teknisi', [PageController::class, 'teknisi'])->name('teknisi');
    Route::get('/food-beverage', [PageController::class, 'foodBeverage'])->name('fnb');
    Route::get('/parking', [PageController::class, 'parking'])->name('parking');
    Route::get('/gondola', [PageController::class, 'gondola'])->name('gondola');
});

// Blog routes - frontend (PUBLIC)
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.show');

// ============================================
// ADMIN ROUTES (PROTECTED)
// ============================================

// Admin Authentication
Route::get('/admin/login', [PageController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login', [PageController::class, 'adminLoginSubmit'])->name('admin.login.submit');
Route::post('/admin/logout', [PageController::class, 'adminLogout'])->name('admin.logout');

// Admin Blog Management (CRUD) - HANYA ADMIN
Route::prefix('admin/blog')->name('admin.blog.')->group(function () {
    Route::get('/', [PageController::class, 'adminBlogIndex'])->name('index');
    Route::get('/create', [PageController::class, 'adminBlogCreate'])->name('create');
    Route::post('/', [PageController::class, 'adminBlogStore'])->name('store');
    Route::get('/{id}/edit', [PageController::class, 'adminBlogEdit'])->name('edit');
    Route::put('/{id}', [PageController::class, 'adminBlogUpdate'])->name('update');
    Route::delete('/{id}', [PageController::class, 'adminBlogDestroy'])->name('destroy');
});

// Fallback untuk route yang tidak ditemukan
Route::fallback(function () {
    return view('pages.404');
});