<?php

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

Route::get('/', 'Controller@index');
Route::get('/form/section/{section}', 'Controller@formSection')->name('formStep');

Route::post('/form/stepone', 'Controller@stepone')->name('formStepOne');
Route::post('/form/steptwo', 'Controller@steptwo')->name('formStepTwo');
Route::post('/form/stepthree', 'Controller@stepthree')->name('formStepThree');
Route::post('/form/stepfour', 'Controller@stepfour')->name('formStepFour');
Route::post('/form/stepfive', 'Controller@stepfive')->name('formStepFive');

Route::get('/name', 'Controller@name')->name('name');

// testing routes
Route::get('/testing/spoof', 'Controller@testinput');
