<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;


// Public Routes
Route::get('/',[UserController::class, 'user']);
Route::get('/login',[SesiController::class,'index'])->name('login');
Route::post('/login',[SesiController::class,'login']);

Route::get('/Ucontact', function () {
    return view('user.contact');
});
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

Route::get('/Upariwisata', [PariwisataController::class, 'showPariwisata'])->name('showPariwisata');

Route::get('/Ufasilitas', [FasilitasController::class, 'showFasilitas'])->name('showFasilitas');


// Auth Routes (Logout & User Dashboard)
Route::middleware(['auth'])->group(function () {
    Route::get('/logout',[SesiController::class,'logout']);
    Route::get('/user',[UserController::class,'user']); 
});


// Admin Routes
Route::middleware(['auth', 'userAkses:admin'])->group(function () {
    // Admin Dashboard & Messages
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/dashboard', [MessageController::class, 'index'])->name('admin.messages');
    Route::get('/admin/messages/ajax', [MessageController::class, 'getMessages'])->name('admin.messages.ajax');
    Route::get('/messages/{email}/delete', [MessageController::class, 'deleteMessage'])->name('messages.delete');

    // Pariwisata Management
    Route::resource('pariwisata', PariwisataController::class)->except(['show']);
    Route::get('/Mpariwisata', [PariwisataController::class, 'index'])->name('admin.pariwisata');
    Route::get('/pariwisata/create', [PariwisataController::class, 'create'])->name('admin.pariwisata.tambah');
    Route::post('/pariwisata', [PariwisataController::class, 'store'])->name('pariwisata.store');
    Route::get('/pariwisata/{id}/edit', [PariwisataController::class, 'edit'])->name('admin.pariwisata.edit');
    Route::put('/pariwisata/{id}', [PariwisataController::class, 'update'])->name('admin.pariwisata.update');
    Route::delete('/pariwisata/{id}', [PariwisataController::class, 'destroy'])->name('admin.pariwisata.hapus');

    // Fasilitas Management
    Route::resource('fasilitas', FasilitasController::class)->except(['show']);
    Route::get('/Mfasilitas', [FasilitasController::class, 'index'])->name('admin.fasilitas');
    Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('admin.fasilitas.tambah');
    Route::post('/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::get('/fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->name('admin.fasilitas.edit');
    Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->name('admin.fasilitas.update');
    Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('admin.fasilitas.destroy');
});

// Detail Routes (Bisa diakses public/user) diletakkan di bagian paling bawah
Route::get('/pariwisata/{id}', [PariwisataController::class, 'show'])->name('pariwisata.show');
Route::get('/fasilitas/{id}', [FasilitasController::class, 'show'])->name('fasilitas.show');
