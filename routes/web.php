<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\teacher\TeacherController;


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


// homepage without login needed, it's the homepage off the application
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/ressources',[HomeController::class,'ressources'])->name('ressources');






// admin route only for admin logged
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){



});

Route::middleware(['auth:sanctum','verified','admin'])->get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');


// teacher route only for teacher logged
Route::group(['prefix' => 'teacher', 'middleware' => ['teacher']], function(){



});

// teacher route only for teacher logged
Route::middleware(['auth:sanctum','verified','teacher'])->get('teacher/dashboard',[TeacherController::class,'dashboard'])->name('teacher.dashboard');






// student route only for student logged
Route::group(['prefix' => 'student','middleware' => ['student']], function(){



});
Route::middleware(['auth:sanctum','verified','student'])->get('student/dashboard',[StudentController::class,'dashboard'])->name('student.dashboard');


// roue for resources only for all auth logged
Route::group(['middleware' => ['auth:sanctum','verified']], function () {

    Route::resources([
        'resources' => ResourcesController::class,
    ]);
});



// error route , 404 and middleware forbidden. you can personalize the 404 page in view/404
Route::get('/404', function(){
    return view('404.404');
})->name('404');






