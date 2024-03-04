<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'name' => 'Muhammad Rizky',
        'role' => 'admin',
        'product' => ['Laptop', 'Handphone', 'Ipad', 'Macbook']
    ]);
});


Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']);

Route::get('/class', [ClassController::class, 'index']);

Route::get('/extracurricular', [ExtracurricularController::class, 'index']);

Route::get('/teacher', [TeacherController::class, 'index']);
