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


Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', ['as' => 'login','uses' => 'LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', ['as'=>'logout','uses'=>'Auth\LoginController@logout']);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('companies', 'CompanyController');
Route::resource('employees', 'EmployeeController');
Route::get('/companies/list',['as' =>'companies.list','uses' => 'CompanyController@listCompanies']);

