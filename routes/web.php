<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComplaintController;

// Halaman utama
Route::get('/', [PageController::class, 'index'])->name('home');

// Halaman statis
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/complaint/submit', [ComplaintController::class, 'submit'])->name('complaint.submit');
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
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// ============================================
// ADMIN ROUTES (PROTECTED)
// ============================================

// Admin Authentication
Route::get('/admin/login', [PageController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login', [PageController::class, 'adminLoginSubmit'])->name('admin.login.submit');
Route::post('/admin/logout', [PageController::class, 'adminLogout'])->name('admin.logout');

// Admin Blog Management
Route::prefix('admin/blog')->name('admin.blog.')->group(function () {
    Route::get('/', [BlogController::class, 'adminIndex'])->name('index');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/', [BlogController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BlogController::class, 'update'])->name('update');
    Route::delete('/{id}', [BlogController::class, 'destroy'])->name('destroy');
});

// Admin Complaint Authentication
Route::prefix('admin/complaints')->name('admin.complaints.')->group(function () {
    Route::get('/login', [ComplaintController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [ComplaintController::class, 'processLogin'])->name('login.submit');
    Route::post('/logout', [ComplaintController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [ComplaintController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [ComplaintController::class, 'index'])->name('index');
    Route::get('/{id}', [ComplaintController::class, 'show'])->name('show');
    Route::put('/{id}/status', [ComplaintController::class, 'updateStatus'])->name('update.status');
    Route::delete('/{id}', [ComplaintController::class, 'destroy'])->name('destroy');
});