<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Master;
use App\Http\Controllers\C_MasterAdmin;

use App\Http\Controllers\C_PristineTickets;
use App\Http\Controllers\C_PristineTicketsAdmin;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataCabangController;
use App\Http\Controllers\DataEventController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

//FITUR CLEAR
Route::get('/clear', function () {
    $exitcode = Artisan::call('optimize:clear');
    return 'DONE';
});

// Halaman Website Create
Route::get('QR', [C_Master::class, 'generateQR'])->name('QR_G')->withoutMiddleware('auth');
Route::get('QR/create', [C_Master::class, 'generateQR_create'])->name('QR_G_create')->withoutMiddleware('auth');
Route::post('QR/store', [C_Master::class, 'generateQR_store'])->name('QR_G_store')->withoutMiddleware('auth');
Route::get('QR/edit', [C_Master::class, 'generateQR_edit'])->name('QR_G_edit')->withoutMiddleware('auth');
Route::get('QR/delete{id}', [C_Master::class, 'generateQR_delete'])->name('QR_G_delete')->withoutMiddleware('auth');

// Halaman Register QR
Route::get('/', [C_PristineTickets::class, 'showqr'])->name('showqr')->withoutMiddleware('auth');
Route::get('/registerqr', [C_PristineTickets::class, 'create'])->name('registerqr')->withoutMiddleware('auth');
Route::post('/reqgisterqr/post', [C_PristineTickets::class, 'store'])->name('registerqr.post')->withoutMiddleware('auth');
Route::get('registerqr/delete{id}', [C_PristineTickets::class, 'registerqr_delete'])->name('registerqr_delete')->withoutMiddleware('auth');

Auth::routes();

// ## ADMIN MAKNALA ______________#
Route::get('CMS', [LoginController::class, 'showLoginForm'])->name('showLoginForm');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('CMS/dashboard', [C_PristineTicketsAdmin::class, 'dashboard'])->name('dashboard')->middleware('auth');

// # Register
Route::get('CMS/FormRegister', [C_PristineTicketsAdmin::class, 'form_Register'])->name('cmsFormRegister')->middleware('auth');
Route::get('CMS/FormRegister/delete/{id}', [C_PristineTicketsAdmin::class, 'form_Register_delete'])->name('cmsFormRegisterDelete')->middleware('auth');

// cabang
Route::get('CMS/cabang', [DataCabangController::class, 'index'])->name('cabang.index')->middleware(['auth']);
Route::get('CMS/cabang/add', [DataCabangController::class, 'create'])->name('cabang.create')->middleware(['auth']);
Route::post('CMS/cabang/create', [DataCabangController::class, 'store'])->name('cabang.store')->middleware(['auth']);
Route::delete('CMS/cabang/{id}', [DataCabangController::class, 'destroy'])->name('cabang.delete')->middleware(['auth']);

//event
Route::get('CMS/event', [DataEventController::class, 'index'])->name('event.index')->middleware(['auth']);
Route::get('CMS/event/add', [DataEventController::class, 'create'])->name('event.create')->middleware(['auth']);
Route::get('CMS/event/{id_studio}', [DataEventController::class, 'edit'])->name('event.edit')->middleware(['auth']);
Route::post('CMS/event/create', [DataEventController::class, 'store'])->name('event.store')->middleware(['auth']);
Route::put('CMS/event/update/{id_studio}', [DataEventController::class, 'update'])->name('event.update')->middleware(['auth']);
Route::delete('CMS/event/{id}', [DataEventController::class, 'destroy'])->name('event.delete')->middleware(['auth']);

// # Master
Route::get('CMS/master', [C_MasterAdmin::class, 'master'])->name('cmsmaster')->middleware('auth');
Route::get('CMS/master/add', [C_MasterAdmin::class, 'masteradd'])->name('cmsmasterAdd')->middleware('auth');
Route::post('CMS/master/store', [C_MasterAdmin::class, 'masterstore'])->name('cmsmasterStore')->middleware('auth');
Route::get('CMS/master/edit/{id}', [C_MasterAdmin::class, 'masteredit'])->name('cmsmasterEdit')->middleware('auth');
Route::post('CMS/master/update', [C_MasterAdmin::class, 'masterupdate'])->name('cmsmasterUpdate')->middleware('auth');
Route::get('CMS/master/delete/{id}', [C_MasterAdmin::class, 'masterdelete'])->name('cmsmasterDelete')->middleware('auth');


// json
Route::post('/cekStudios', [C_PristineTickets::class, 'cekCabangs'])->withoutMiddleware('auth');
Route::post('/cekNoKtp', [C_PristineTickets::class, 'cekNoKtp'])->withoutMiddleware('auth');
