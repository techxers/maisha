<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MyQuizController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyCoursesController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\MyQuiz;
use Illuminate\Http\Request;

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
    return view('new');
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

//Verify email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

//Trainee Routes
Route::middleware('verified')->group(function(){// Ensures user email is verified before logging in
    Route::get('/courses', [DashboardController::class,'courses'])->name('courses');
    Route::get('/viewcourse/{id}', [DashboardController::class,'viewcourse'])->name('viewcourse');
    Route::get('/mycourses',[DashboardController::class,'mycourses'])->name('mycourses');

    Route::get('/forums',[ForumController::class,'index'])->name('forums');
    Route::get('/create/forum',[ForumController::class,'create'])->name('forum.create');
    Route::post('/forum/store',[ForumController::class,'store'])->name('forum.store');
    Route::get('/forum/show/{id}',[ForumController::class,'show'])->name('forum.show');
    Route::post('/forum/update/{id}',[ForumController::class,'update'])->name('forum.update');

    Route::get('/myquizresults', [MyQuizController::class,'index'])->name('quizresults');
    Route::get('/myquiz/{id}', [MyQuizController::class,'create'])->name('myquiz.create');
    Route::post('/myquiz/submit/{id}', [MyQuizController::class,'store'])->name('myquiz.store');
    Route::get('/myquiz/view/{id}',[MyQuizController::class,'show'])->name('myquiz.show');
    Route::get('/myquiz/restart/{id}',[MyQuizController::class,'edit'])->name('myquiz.restart');
// Instructor Routes
Route::middleware('status')->group(function(){//Checks whether instructor profile has been updated
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

    Route::get('/quizes',[QuizController::class,'index'])->name('quizzes');
    Route::get('/create/quiz',[QuizController::class,'create'])->name('quiz.create');
    Route::post('/quiz/store',[QuizController::class,'store'])->name('quiz.store');
    Route::get('/quiz/edit/{id}',[QuizController::class,'edit'])->name('quiz.edit');
    Route::post('/quiz/update/{id}',[QuizController::class,'update'])->name('quiz.update');

    Route::post('/reply/store{id}',[ReplyController::class,'store'])->name('reply.store');
    
    Route::get('/create/question/{id}',[QuestionController::class,'create'])->name('question.create');
    Route::post('/store/question/{id}',[QuestionController::class,'store'])->name('question.store');
    Route::get('/edit/question/{id}',[QuestionController::class,'edit'])->name('question.edit');
    Route::post('/update/question/{id}',[QuestionController::class,'update'])->name('question.update');

    
});
    Route::get('/profile/{id}',[DashboardController::class,'profile'])->name('profile.edit');
    Route::post('/profile/{id}',[DashboardController::class,'update'])->name('profile.update');
    Route::get('/viewprofile/{id}',[DashboardController::class,'viewprofile'])->name('profile.show');

    Route::get('/inactive', [DashboardController::class,'inactive'])->name('inactive');// Returns when instructor profile has not been approved

//Admin Routes
    Route::get('/instructors', [InstructorController::class,'index'])->name('instructors');
    Route::get('/instructor/{id}/show', [InstructorController::class,'show'])->name('show.instructors');
    Route::get('/instructor/{id}/certificate', [InstructorController::class,'certificate'])->name('certificate');
    Route::get('/instructor/{id}/activate', [InstructorController::class,'activate'])->name('activate');
    Route::get('/instructor/{id}/deactivate', [InstructorController::class,'deactivate'])->name('deactivate');

    Route::get('/courses/{id}/approve',[CourseController::class,'approve'])->name('approve');
    Route::get('/courses/{id}/disapprove',[CourseController::class,'disapprove'])->name('disapprove');

    Route::get('/quiz/{id}/approve',[QuizController::class,'approve'])->name('quiz.approve');
    Route::get('/quiz/{id}/disapprove',[QuizController::class,'disapprove'])->name('quiz.disapprove');

    Route::get('/forum/{id}/delete',[ForumController::class,'destroy'])->name('forum.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
