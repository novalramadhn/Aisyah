<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    //dashboard
    Route::get('', [AdminController::class, 'index'])->name('admin.dashboard.index');


    //guru
    // Route::group(['prefix' => 'guru'], function () {
    //     Route::get('', [GuruController::class, 'index'])->name('admin.guru.index');
    //     Route::get('create', [GuruController::class, 'create'])->name('admin.guru.create');
    //     Route::get('edit/{id}', [GuruController::class, 'edit'])->name('admin.guru.edit');
    //     Route::get('show/{id}', [GuruController::class, 'show'])->name('admin.guru.show');
    // });

    //Jadwal
    // Route::group(['prefix' => 'jadwal'], function () {
    //     Route::get('', [JadwalController::class, 'index'])->name('admin.jadwal.index');
    //     Route::get('create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
    //     Route::get('edit/{id}', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
    //     Route::get('show/{id}', [JadwalController::class, 'show'])->name('admin.jadwal.show');
    // });

    //siswa
    // Route::group(['prefix' => 'siswa'], function () {
    //     Route::get('', [SiswaController::class, 'index'])->name('admin.siswa.index');
    // });

    // kelas
    // Route::group(['prefix' => 'kelas'], function() {
    //     Route::resource('kelas', KelasController::class);
    // });

    //mapel
    Route::resource('/mapels', \App\Http\Controllers\MapelController::class);

    //user
    // Route::group(['prefix' => 'user'], function () {
    //     Route::get('', [UserController::class, 'index'])->name('admin.user.index');
    // });

    //nilai
    // Route::group(['prefix' => 'nilai'], function () {
    //     Route::get('', [NilaiController::class, 'index'])->name('admin.nilai.index');
    // });

    //pengumuman
    // Route::group(['prefix' => 'pengumuman'], function () {
    //     Route::get('', [PengumumanController::class, 'pengumuman'])->name('admin.pengumuman.index');
    // });
});
