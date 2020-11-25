<?php

use App\Http\Controllers\admin\AdminProfilController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\student\StudentProfilController;
use App\Http\Controllers\teacher\TeacherProfilController;

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

Route::get('/',[HomeController::class,'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){

    Route::get('/dashboard', [AdminProfilController::class,'dashboard'])->name(('admin.dashboard'));
    //Route::get('/profil',[UserController::class,'profil'])->name('profil');
    Route::resources([
        'category' => CategoryController::class,
        'tag' => TagController::class,
        'post' => PostController::class,
        'user' => UserController::class,
        'upload'=>UploadController::class
    ]);

});

Route::group(['prefix' => 'teacher', 'middleware' => ['auth']], function(){

    Route::get('/dashboard', [TeacherProfilController::class,'dashboard'])->name(('teacher.dashboard'));
   // Route::get('/profil',[UserController::class,'profil'])->name('profil');
    // Route::resources([
    //     'category' => CategoryController::class,
    //     'tag' => TagController::class,
    //     'post' => PostController::class,
    //     'user' => UserController::class,
    //     'upload'=>UploadController::class
    // ]);

});

Route::group(['prefix' => 'student', 'middleware' => ['auth'] && 'role_id' == '3'], function(){

    Route::get('/dashboard', [StudentProfilController::class,'dashboard'])->name(('student.dashboard'));
    Route::get('/profil',[UserController::class,'profil'])->name('profil');
    // Route::resources([
    //     'category' => CategoryController::class,
    //     'tag' => TagController::class,
    //     'post' => PostController::class,
    //     'user' => UserController::class,
    //     'upload'=>UploadController::class
    // ]);

});




