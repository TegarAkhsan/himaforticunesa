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
use App\Http\Controllers\PortalController;


Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen.index');
Route::get('/departemen/{slug}', [DepartemenController::class, 'show'])->name('departemen.show');

Route::get('/portal-lomba', [PortalController::class, 'lomba'])->name('portal.lomba');
Route::get('/prestasi', [PortalController::class, 'prestasi'])->name('portal.prestasi');

Route::get('/dokumen', [NavbarController::class, 'index'])->name('dokumen');
Route::get('/dokumen/download/{id}', [NavbarController::class, 'download'])->name('file.download');

// New Features
use App\Http\Controllers\AdvocacyController;
use App\Http\Controllers\PublicQuestionController;

Route::get('/advokasi', [AdvocacyController::class, 'index'])->name('advokasi.index');
Route::post('/advokasi', [AdvocacyController::class, 'store'])->name('advokasi.store');
Route::post('/questions', [PublicQuestionController::class, 'store'])->name('questions.store');

