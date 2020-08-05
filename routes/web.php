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

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'CheckRole:mahasiswa']], function () {

    Route::get('/', function () {
        return redirect('/dashboard-mahasiswa');
    });

    Route::get('/dashboard-mahasiswa', function () {
        return view('dashboard');
    });

    Route::get('profile/mahasiswa', 'ProfileMahasiswaController@edit')->name('profile.mahasiswa.edit');
    Route::patch('profile/mahasiswa', 'ProfileMahasiswaController@update')->name('profile.mahasiswa.update');

    Route::get('kartu-rencana-stud  i/mahasiswa/ambil-krs', 'KartuRencanaStudiController@indexMahasiswa')->name('mahasiswa.krs');
    // Route::post('kartu-rencana-studi/mahasiswa/pilih', 'KartuRencanaStudiController@create')->name('mahasiswa.krs.create');
    Route::post('kartu-rencana-studi/mahasiswa', 'KartuRencanaStudiController@store')->name('mahasiswa.krs.store');
    Route::get('kartu-rencana-studi/mahasiswa/hasil-krs', 'KartuRencanaStudiController@indexMahasiswaHasil')->name('mahasiswa.krs.hasil');
    Route::get('kartu-rencana-studi/mahasiswa/hapus-krs', 'KartuRencanaStudiController@indexMahasiswaHapus')->name('krs.hapus');
    Route::post('kartu-rencana-studi/mahasiswa/delete', 'KartuRencanaStudiController@delete')->name('mahasiswa.krs.delete');
    Route::delete('kartu-rencana-studi/mahasiswa/{id}', 'KartuRencanaStudiController@destroyM')->name('mahasiswa.krs.destroy');
    Route::get('kartu-rencana-studi/print-krs', 'KartuRencanaStudiController@print')->name('print.krs');

    Route::get('markAsRead', function() {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('mark.as.read');

});

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {

    Route::get('/', function () {
        return redirect('/dashboard-admin');
    });

    Route::get('/dashboard-admin', function () {
        return view('dashboard');
    });

    Route::get('profile/admin', 'ProfileAdminController@edit')->name('profile.admin.edit');
    Route::patch('profile/admin', 'ProfileAdminController@update')->name('profile.admin.update');

    Route::resource('angkatan', 'AngkatanController');
    Route::resource('tahun-ajaran', 'TahunAjaranController');
    Route::resource('program-studi', 'ProgramStudiController');
    Route::resource('mata-kuliah', 'MataKuliahController');
    Route::resource('mahasiswa', 'MahasiswaController');
    Route::resource('dosen', 'DosenController');

    Route::get('kartu-rencana-studi/admin', 'KartuRencanaStudiController@indexAdmin')->name('admin.krs');
    Route::post('kartu-rencana-studi/admin/{id}', 'KartuRencanaStudiController@update')->name('admin.krs.update');
    Route::delete('kartu-rencana-studi/admin/{id}', 'KartuRencanaStudiController@destroy')->name('admin.krs.destroy');

});

