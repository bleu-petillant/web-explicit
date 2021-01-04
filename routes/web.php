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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\student\StudentDashboardController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\teacher\TeacherDashboardController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\ValideQuestionController;

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


//  everybody can access this pages without account
Route::get('/',[HomeController::class,'index'])->name('home');// home page
Route::get('/resources',[HomeController::class,'allResources'])->name('ressources.all');// page all ressources
Route::get('/cas d usage',[HomeController::class,'usage'])->name('usage');//page cas d 'usage
Route::get('/contact',[ContactController::class,'contact'])->name('contact');//page contact
Route::get('/polices',[HomeController::class,'policies'])->name('police de confidentialite');
Route::get('/mentions légales',[HomeController::class,'mentions'])->name('mentions');
Route::post('/message',[ContactController::class,'send'])->name('message');


// admin dashboard
Route::middleware(['auth:sanctum','verified','admin'])->get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

// teacher dashboard
Route::middleware(['auth:sanctum','verified','admin'])->get('teacher/dashboard',[TeacherDashboardController::class,'dashboard'])->name('teacher.dashboard');

// student dashboard
Route::group(['prefix' => 'student','middleware' => ['student']], function(){

    Route::get('/dashboard',[StudentDashboardController::class,'dashboard'])->name('student.dashboard');

});



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
        'reference'=>ReferenceController::class,
        'usage'=>UsageController::class,
        'question'=>QuestionController::class
    ]);

});







// route for resources only for all auth logged
Route::group(['middleware' => ['auth:sanctum','verified']], function () {

Route::get('/nos formations',[HomeController::class,'allCourses'])->name('formations.all');
Route::get('/nos formations/ressources',[HomeController::class,'ResourcesPrivate'])->name('ressources.private');// page all ressources
Route::get('/formation/{slug}',[HomeController::class,'showCourse'])->name('formation');

Route::post('/checkreponse',[ValideQuestionController::class,'checkTheAnswers'])->name('checkreponse');
Route::post('/get_question_position',[ValideQuestionController::class,'GetData'])->name('getdata');

});



// error route , 404 and middleware forbidden. you can personalize the 404 page in view/404
Route::get('/permissions', function(){
    return view('errors.permissions');
})->name('permissions');




