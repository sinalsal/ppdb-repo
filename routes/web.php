<?php

use App\Http\Controllers\AuthController;
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
Route::get('/dashboard_admin', function () {
    return view('dashboard_admin');
});
Route::get('/form', function () {
    return view('form');
});
Route::get('/daftar', function () {
    return view('daftar');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard_siswa',function () {
    return view('dashboard_siswa');
});

Route::get('/form', 'FormController@form');

Route::post('/proses', 'FormController@proses');
Route::get('/export', 'AuthController@export')->name('export');
Route::delete('/user/salah/{id}', [AuthController::class, 'salah']);


Route::get('/calonsiswa','CalonsiswaController@index')->name('calonsiswa.index');
Route::get('/calonsiswa/create','CalonsiswaController@create')->name('calonsiswa.create');
Route::post('/calonsiswa','CalonsiswaController@store')->name('calonsiswa.store');
Route::get('/dashboard_admin/tampil','AuthController@tampil')->name('dataregis');


Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');
 
});

Route::resource('admin', AdminController::class);


Route::group(['middleware' => 'auth','role:admin'], function () {
 

    Route::get('/dashboard_admin', function () {
        return view('dashboard_admin');
    });
    
 
});


Route::group(['middleware' => 'auth','role:user'], function () {
 

    Route::get('/dashboard_siswa', function () {
        return view('dashboard_siswa');
    });
    
    Route::get('/form', function () {
        return view('form');
    });
    
 
});
