<?php

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\student\StudentDashboardController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\teacher\TeacherDashboardController;

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
Route::get('/resources',[HomeController::class,'allResources'])->name('ressources.all');
Route::get('/ressource/{slug}',[HomeController::class,'showResources'])->name('ressource.show');
Route::get('/cas d usage',[HomeController::class,'usage'])->name('usage');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

// student dashboard
Route::middleware(['auth:sanctum','verified','student'])->get('student/dashboard',[StudentDashboardController::class,'dashboard'])->name('student.dashboard');

// admin dashboard
Route::middleware(['auth:sanctum','verified','admin'])->get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

// teacher dashboard
Route::middleware(['auth:sanctum','verified','teacher'])->get('teacher/dashboard',[TeacherDashboardController::class,'dashboard'])->name('teacher.dashboard');



// admin route only for admin logged
Route::group(['prefix' => 'admin', 'middleware' => ['super']], function(){
    Route::get('list',[AdminController::class,'index'])->name('admin.list');
    Route::get('/add-super',[AdminController::class,'create'])->name('admin.create');
    Route::post('/create-super',[AdminController::class,'store'])->name('admin.store');
    Route::resources([
        'student' => StudentController::class,
        'teacher' => TeacherController::class,
        'course' => CourseController::class,
        'category' => CategoryController::class,
        'tag'=>TagsController::class,
        'reference'=>ReferenceController::class
    ]);

});



// student route only for student logged
Route::group(['prefix' => 'student','middleware' => ['student']], function(){



});



// route for resources only for all auth logged
Route::group(['middleware' => ['auth:sanctum','verified']], function () {

Route::get('/nos formations',[HomeController::class,'allCourses'])->name('formations.all');


Route::get('/formation/{slug}',[HomeController::class,'showCourse'])->name('formation.show');

});



// error route , 404 and middleware forbidden. you can personalize the 404 page in view/404
Route::get('/permissions', function(){
    return view('errors.permissions');
})->name('permissions');




