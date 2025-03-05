<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\QuizzController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SolutionsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

// THis for quizzfile 
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/quizz',[QuizzController::class,'index'])->name('admin.quizz');
    Route::get('/question',[QuizzController::class,'index'])->name('admin.quizz');
    Route::get('/users',[QuizzController::class,'index'])->name('admin.quizz');
});


// THis for quizzfile 
Route::post('/quizz/store', [QuizzController::class, 'store'])->name('quizz.store');
Route::get('/quizz/destroy',[QuizzController::class,'destroy'])->name('quizz.destroy');
Route::get('/quizz/edit',[QuizzController::class,'edit'])->name('quizz.edit');
Route::post('/quizz/create',[QuizzController::class,'create'])->name('quizz.create');

// this for question
Route::get('/question/index',[QuestionController::class,'index'])->name('questions.index');
Route::post('/qestion/store', [QuestionController::class, 'store'])->name('question.store');
Route::post('/solution', [SolutionsController::class, 'store'])->name('solution.store');
Route::post('/user/dashboard', [UserController::class, 'index'])->name('solutionid.store');


// this for User

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::post('/ruseltat', [resultaController::class, 'index'])->name('user.ruseltat');
   
});



 












require __DIR__.'/auth.php';
