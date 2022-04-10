<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/dashboard',[TaskController::class,'home'])->middleware(['auth'])->name('dashboard');


Route::post('insert', [TaskController::class, 'store']);
Route::get('show', [TaskController::class, 'show']);
Route::get('delete/{id}', [TaskController::class, 'delete']);
Route::get('edit/{id}', [TaskController::class, 'edit']);
Route::post('update/{edit_data}', [TaskController::class, 'update']);

Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
Route::post('employee_insert', [EmployeeController::class, 'store']);
Route::get('employee_show', [EmployeeController::class, 'show']);
Route::get('emp_delete/{id}', [EmployeeController::class, 'deleteEmploye']);
Route::get('emp_edit/{id}', [EmployeeController::class, 'editEmploye']);
Route::post('employee_update', [EmployeeController::class, 'updateEmploye']);

require __DIR__.'/auth.php';
