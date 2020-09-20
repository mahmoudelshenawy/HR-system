<?php
use Illuminate\Support\Facades\Route;

Route::pattern('id','[0-9]+');

Route::get('/','EmployeesController@index');
Route::get('/add/{branch_id?}','EmployeesController@add');
Route::post('/add/','EmployeesController@post_add');
Route::get('/{id}','EmployeesController@show');
Route::put('/update/{id}','EmployeesController@update');
Route::get('/export-data','ExportEmployeesController@excel');

Route::get('/month-attendance-time','EmployeesMonthlyAttendanceTime@index')->name('monthly_attendance_time');




Route::resource('companions','CompanionController');
Route::resource('custodys','CustodyController');
Route::resource('loans','LoansController');
Route::resource('resignations','ResignationController');

////////////profile model edit //////////

