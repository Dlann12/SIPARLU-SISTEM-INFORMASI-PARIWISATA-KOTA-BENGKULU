<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;


Route::get('/',[UserController::class, 'user']);
Route::post('/login',[SesiController::class,'login']);
Route::get('/login',[SesiController::class,'index']);


Route::get('/admin',[AdminController::class,'admin']);
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/logout',[SesiController::class,'logout']);


Route::get('/user',[UserController::class,'user']);
Route::get('/logout',[SesiController::class,'logout']);


Route::get('/Ufasilitas', function () {
    return view('user.datafasilitas');
});
Route::get('/Ucontact', function () {
    return view('user.contact');
});



Route::resource('pariwisata', PariwisataController::class);
Route::get('/Mpariwisata', [PariwisataController::class, 'index'])->name('admin.pariwisata');
Route::get('/pariwisata/{id}/edit', [PariwisataController::class, 'edit'])->name('admin.pariwisata.edit');
Route::put('/pariwisata/{id}', [PariwisataController::class, 'update'])->name('admin.pariwisata.update');
Route::delete('/pariwisata/{id}', [PariwisataController::class, 'destroy'])->name('admin.pariwisata.hapus');
Route::get('pariwisata/create', [PariwisataController::class, 'create'])->name('admin.pariwisata.tambah');
Route::post('pariwisata', [PariwisataController::class, 'store'])->name('pariwisata.store');
Route::get('/Upariwisata', [PariwisataController::class, 'showPariwisata'])->name('showPariwisata');
Route::get('/pariwisata/{id}', [PariwisataController::class, 'show'])->name('pariwisata.show');





Route::resource('fasilitas', FasilitasController::class);
Route::get('/Mfasilitas', [FasilitasController::class, 'index'])->name('admin.fasilitas');
Route::get('fasilitas/create', [FasilitasController::class, 'create'])->name('admin.fasilitas.tambah');
Route::post('fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
Route::get('/fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->name('admin.fasilitas.edit');
Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->name('admin.fasilitas.update');
Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('admin.fasilitas.destroy');
Route::get('/Ufasilitas', [FasilitasController::class, 'showFasilitas'])->name('showFasilitas');
Route::get('/fasilitas/{id}', [FasilitasController::class, 'show'])->name('fasilitas.show');




Route::get('/admin/dashboard', [MessageController::class, 'index'])->name('admin.messages');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::middleware(['auth'])->get('/admin/messages/ajax', [MessageController::class, 'getMessages'])->name('admin.messages.ajax');
Route::get('/messages/{email}/delete', [MessageController::class, 'deleteMessage'])->name('messages.delete');
