<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

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
Route::any('/', function(){
    return view('welcome');
});

Route::any('/example', function(){
    return view('example');
});
Route::get('/estudantes', [StudentController::class, 'index']);
Route::get('/add-estudante', [StudentController::class, 'create']);
Route::post('/save-student', [StudentController::class, 'store']);
Route::post('/get-students', [StudentController::class, 'fetchStudentData']);
Route::get('/edit-studant/{id}/edit', [StudentController::class, 'edit']);
Route::get('/fetch-student-showbyid/{id}', [StudentController::class, 'editData']);
Route::put('/update-student/{id}', [StudentController::class, 'update']);
Route::get('/ver-estudante/{id}', [StudentController::class, 'showPage']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


