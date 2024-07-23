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

Route::get('/add-estudante', [StudentController::class, 'create']);

Route::post('/save-student', [StudentController::class, 'store']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


