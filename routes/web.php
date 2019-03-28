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

Route::get('login', ['as' => 'login','uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', ['as'=>'logout','uses'=>'Auth\LoginController@logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('companies', 'CompanyController');
    Route::resource('employees', 'EmployeeController');
    Route::get('/companieslist',['as' =>'companies.list','uses' => 'CompanyController@list']);
    Route::get('companies/delete/{id}', ['as' => 'companies.delete', 'uses' => 'CompanyController@destroy']);
    Route::get('/employeeslist',['as' =>'employees.list','uses' => 'EmployeeController@listEmployees']);
    Route::get('employees/delete/{id}', ['as' => 'employees.delete', 'uses' => 'EmployeeController@destroy']);
});

