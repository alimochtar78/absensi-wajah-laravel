<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\IzinCutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('laporan-absensi', [DashboardController::class, 'index'])->name('laporan.absensi');
});

Route::middleware(['auth'])->group(function () {
    Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('absensi', [AbsensiController::class, 'store'])->name('absensi.store');

    Route::get('izin', [IzinCutiController::class, 'index'])->name('izin.index');
    Route::get('izin/create', [IzinCutiController::class, 'create'])->name('izin.create');
    Route::post('izin', [IzinCutiController::class, 'store'])->name('izin.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{id}/update-role', [AdminController::class, 'updateRole'])->name('admin.updateRole');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
