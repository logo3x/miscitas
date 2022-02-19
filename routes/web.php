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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
    //Specialty
Route::get('/specialties','App\Http\Controllers\SpecialtyController@index');
Route::get('/specialties/create','App\Http\Controllers\SpecialtyController@create');// form registro
Route::get('/specialties/{specialty}/edit','App\Http\Controllers\SpecialtyController@edit');
Route::post('/specialties','App\Http\Controllers\SpecialtyController@store');// envio del form
Route::put('/specialties/{specialty}','App\Http\Controllers\SpecialtyController@update');
Route::delete('/specialties/{specialty}','App\Http\Controllers\SpecialtyController@destroy');

//Doctors
Route::resource('doctors','App\Http\Controllers\DoctorController');

//Patients


});