<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employeemodel;
use App\Http\Controllers\Employeecontroller;

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

 Route::get('/employee', function(){
     $data = Employeemodel::all();
     return view('employeeview')->withEdata($data);
 });
 
 Route::get('/insert',[Employeecontroller::class,'add']);
 Route::post('/insert',[Employeecontroller::class,'insert'])->name('addemployee');
 Route::get('/update',[Employeecontroller::class,'update']);
 Route::get('/delete/{id}',[Employeecontroller::class,'delete']);
 Route::get('/edit/{id}',[Employeecontroller::class,'edit']);
 Route::post('/update',[Employeecontroller::class,'update']);

 Route::get('/employee',[Employeecontroller::class,'index']);
Route::get('/employee/getEmployees/',[Employeecontroller::class,'getEmployees']);
 // ->name('employee.getEmployees')
 