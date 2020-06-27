<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('angkatan', 'AngkatanController');
Route::resource('semester', 'SemesterController');
Route::resource('program-studi', 'ProgramStudiController');
Route::resource('mata-kuliah', 'MataKuliahController');
Route::resource('mahasiswa', 'MahasiswaController');
Route::resource('dosen', 'DosenController');

Route::get('kartu-rencana-studi/mahasiswa', 'KartuRencanaStudiController@indexMahasiswa')->name('mahasiswa.krs');
Route::post('kartu-rencana-studi/mahasiswa', 'KartuRencanaStudiController@store')->name('mahasiswa.krs.store');
Route::get('kartu-rencana-studi/admin', 'KartuRencanaStudiController@indexAdmin')->name('admin.krs');
Route::post('kartu-rencana-studi/admin/{id}', 'KartuRencanaStudiController@update')->name('admin.krs.update');

Auth::routes();

