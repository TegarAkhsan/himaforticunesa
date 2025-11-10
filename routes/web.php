<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengurusHimpunanController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\HimaforticController;
use App\Http\Controllers\NavbarController;


Route::get('/', [PengurusHimpunanController::class, 'index'])->name('homepage');
Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen.index');
Route::get('/departemen/{id}', [DepartemenController::class, 'show'])->name('departemen.show');
Route::get('/history', [HimaforticController::class, 'index'])->name('history.index');

Route::get('/dokumen', [NavbarController::class, 'index'])->name('dokumen');
Route::get('/dokumen/download/{id}', [NavbarController::class, 'download'])->name('file.download');

