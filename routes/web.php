<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\MyCoursesController;
use App\Http\Controllers\SubcategoryController;

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


//Homepage Routes
Route::get('/', function () {
    return view('home');
});
Route::get('/new', function () {
    return view('test');
});
Route::get('/about', function () {
    return view('homepage.about');
})->name('about');
Route::get('/features', function () {
    return view('homepage.features');
})->name('features');
Route::get('/pricing', function () {
    return view('homepage.pricing');
});
Route::get('/contact', function () {
    return view('homepage.contact');
});
Route::get('/instructor', function () {
    return view('auth.instructor');
})->name('instructor');
//Trainee Routes
Route::get('/courses', [DashboardController::class,'courses'])->name('courses');
Route::get('/viewcourse/{id}', [DashboardController::class,'viewcourse'])->name('viewcourse');

Route::get('/mycourses',[MyCoursesController::class,'index'])->name('mycourses');
Route::get('/enroll/{id}',[MyCoursesController::class,'enroll'])->name('enroll');

Route::get('/quizresults', function () {
    return view('dashboard.quizresults');
})->name('quizresults');

// Instructor Routes
Route::middleware('status')->group(function(){
    Route::get('/user', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/coursemanager',[DashboardController::class,'coursemanager'])->name('coursemanager');
    Route::get('/create/course',[CourseController::class,'create'])->name('createcourse');
    Route::post('/add/course',[CourseController::class,'store'])->name('addcourse');
    Route::get('/edit/course/{id}',[CourseController::class,'edit'])->name('editcourse');
    Route::post('/course/update/{id}',[CourseController::class,'update'])->name('courseupdate');
    Route::get('/delete/{id}',[CourseController::class,'destroy'])->name('coursedelete');

    Route::get('/categories', [CategoryController::class,'index'])->name('categories');
    Route::get('/add/categories', [CategoryController::class,'create'])->name('createcategory');
    Route::post('/add/category', [CategoryController::class,'store'])->name('addcategory');
    Route::get('/edit/categories/{id}', [CategoryController::class,'edit'])->name('editcategory');
    Route::post('/update/categories/{id}', [CategoryController::class,'update'])->name('updatecategory');
    Route::get('/delete/category/{id}', [CategoryController::class,'destroy'])->name('deletecategory');

    Route::get('/subcategories', [SubcategoryController::class,'index'])->name('subcategories');
    Route::get('/add/subcategories', [SubcategoryController::class,'create'])->name('createsubcategory');
    Route::post('/add/subcategory', [SubcategoryController::class,'store'])->name('addsubcategory');
    Route::get('/edit/subcategories/{id}', [SubcategoryController::class,'edit'])->name('editsubcategory');
    Route::post('/update/subcategories/{id}', [SubcategoryController::class,'update'])->name('updatesubcategory');
    Route::get('/delete/subcategory/{id}', [SubcategoryController::class,'destroy'])->name('deletesubcategory');

    Route::get('/create/video/{id}',[VideoController::class,'create'])->name('video.create');
    Route::post('/video/store/{id}',[VideoController::class,'store'])->name('video.store');
    Route::get('/video/edit/{id}',[VideoController::class,'edit'])->name('video.edit');
    Route::post('/video/update/{id}',[VideoController::class,'update'])->name('video.update');
});
Route::get('/inactive', [DashboardController::class,'inactive'])->name('inactive');
//Admin Routes
Route::get('/instructors', [InstructorController::class,'index'])->name('instructors');
Route::get('/instructor/{id}/show', [InstructorController::class,'show'])->name('show.instructors');
Route::get('/instructor/{id}/certificate', [InstructorController::class,'certificate'])->name('certificate');
Route::get('/instructor/{id}/activate', [InstructorController::class,'activate'])->name('activate');
Route::get('/instructor/{id}/deactivate', [InstructorController::class,'deactivate'])->name('deactivate');

Route::get('/courses/{id}/approve',[CourseController::class,'approve'])->name('approve');
Route::get('/courses/{id}/disapprove',[CourseController::class,'disapprove'])->name('disapprove');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
