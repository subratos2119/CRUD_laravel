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

Route::get('student','StudentController@studentIndex');
Route::post('student','StudentController@studentStore')->name('student.store');
Route::delete('student/{studentId}','StudentController@studentDel')->name('student.delete');
Route::get('student/{studentId}','StudentController@studentEdit')->name('student.edit');
Route::put('student/{studentId}','StudentController@studentUpdate')->name('student.update');
