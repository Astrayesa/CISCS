<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseLearningOutcomeController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Admin\GraduateProfileController;
use App\Http\Controllers\Admin\LearningOutcomeController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/departments/{department}', [HomeController::class, 'showDepartment'])->name('jurusan');
Route::get('/curriculums', [HomeController::class, 'listCurriculums'])->name('kurikulums');
Route::get('/courses', [HomeController::class, 'listCourses'])->name('matkul');

Route::prefix("/admin")->name('admin.')->group(function () {
    Route::middleware("auth")->group(function () {
        Route::get("/", function () {
            return redirect()->route("admin.department.index");
        })->name("dashboard");
        Route::resource("department", DepartmentController::class);
        Route::resource("curriculum", CurriculumController::class);
        Route::resource("curriculum.course", CourseController::class);
        Route::resource("curriculum.course.clo", CourseLearningOutcomeController::class);
        Route::resource("curriculum.course.topic", TopicController::class);
        Route::resource("curriculum.course.evaluation", EvaluationController::class);
        Route::resource("curriculum.lo", LearningOutcomeController::class)->parameter("lo", "learningOutcome");
        Route::resource("curriculum.gp", GraduateProfileController::class)->parameter("gp", "graduateProfile");
        Route::resource("user", UserController::class);

        Route::post('logout', [AuthController::class, 'destroy'])->name("logout");
    });
});

Route::get("login", [AuthController::class, 'index'])->middleware('guest')->name("login");
Route::post("login", [AuthController::class, 'store'])->middleware('guest');