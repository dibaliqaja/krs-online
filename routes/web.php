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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'CheckRole:mahasiswa']], function () {

    Route::get('/dashboard-mahasiswa', function () {
        return view('profile.dashboard');
    });

    Route::get('profile/mahasiswa', 'ProfileMahasiswaController@edit')->name('profile.mahasiswa.edit');
    Route::patch('profile/mahasiswa', 'ProfileMahasiswaController@update')->name('profile.mahasiswa.update');

    Route::get('kartu-rencana-studi/mahasiswa', 'KartuRencanaStudiController@indexMahasiswa')->name('mahasiswa.krs');
    Route::post('kartu-rencana-studi/mahasiswa', 'KartuRencanaStudiController@store')->name('mahasiswa.krs.store');
    Route::get('kartu-rencana-studi/mahasiswa/hasil', 'KartuRencanaStudiController@indexMahasiswaHasil')->name('mahasiswa.krs.hasil');
    Route::post('kartu-rencana-studi/mahasiswa/delete', 'KartuRencanaStudiController@delete')->name('mahasiswa.krs.delete');

});

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('profile/admin', 'ProfileAdminController@edit')->name('profile.admin.edit');
    Route::patch('profile/admin', 'ProfileAdminController@update')->name('profile.admin.update');

    Route::resource('angkatan', 'AngkatanController');
    Route::resource('semester', 'SemesterController');
    Route::resource('program-studi', 'ProgramStudiController');
    Route::resource('mata-kuliah', 'MataKuliahController');
    Route::resource('mahasiswa', 'MahasiswaController');
    Route::resource('dosen', 'DosenController');

    Route::get('kartu-rencana-studi/admin', 'KartuRencanaStudiController@indexAdmin')->name('admin.krs');
    Route::post('kartu-rencana-studi/admin/{id}', 'KartuRencanaStudiController@update')->name('admin.krs.update');
    Route::delete('kartu-rencana-studi/admin', 'KartuRencanaStudiController@destroy')->name('admin.krs.destroy');
});

// Auth::routes();

