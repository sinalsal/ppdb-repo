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

<<<<<<< HEAD
=======
Route::get('/form', 'FormController@form');

Route::post('/proses', 'FormController@proses');
>>>>>>> 083402fd6c8ec1f3412e1b198bed17e9f4b369ec


Route::get('/calonsiswa','CalonsiswaController@index')->name('calonsiswa.index');
Route::get('/calonsiswa/create','CalonsiswaController@create')->name('calonsiswa.create');
Route::post('/calonsiswa','CalonsiswaController@store')->name('calonsiswa.store');


Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');
 
});

