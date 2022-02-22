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

//'admin' -> se encuentra en App\Http\kernel como ruta al controlador App\Http\Middleware\AdminMiddleware
Route::middleware(['auth', 'admin'])->group( function () {
    //Specialty
Route::get('/specialties','App\Http\Controllers\Admin\SpecialtyController@index');
Route::get('/specialties/create','App\Http\Controllers\Admin\SpecialtyController@create');// form registro
Route::get('/specialties/{specialty}/edit','App\Http\Controllers\Admin\SpecialtyController@edit');
Route::post('/specialties','App\Http\Controllers\Admin\SpecialtyController@store');// envio del form
Route::put('/specialties/{specialty}','App\Http\Controllers\Admin\SpecialtyController@update');
Route::delete('/specialties/{specialty}','App\Http\Controllers\Admin\SpecialtyController@destroy');
//Doctors
Route::resource('doctors','App\Http\Controllers\Admin\DoctorController');
//Patients
Route::resource('patients','App\Http\Controllers\Admin\PatientController');
});

//'doctor' -> se encuentra en App\Http\kernel como ruta al controlador App\Http\Middleware\DoctorMiddleware
Route::middleware(['auth', 'doctor'])->group( function () {
    //Doctors permisos
Route::get('/schedule','App\Http\Controllers\Doctor\ScheduleController@edit');
Route::post('/schedule','App\Http\Controllers\Doctor\ScheduleController@store');

});