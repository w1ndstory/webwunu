<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LabOneController;
use App\Http\Controllers\LabTwoController;
use App\Http\Controllers\LabThreeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabFourController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LabFiveController;


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
    return view('welcome');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/labone', [LabOneController::class, 'labOne'])->name('labOne');
Route::get('/labfive', [LabFiveController::class, 'spiral'])->name('labFive');
Route::get('/labtwo', [LabTwoController::class, 'labTwo'])->name('labTwo');
Route::get('/labthree', [LabThreeController::class, 'labThree'])->name('labThree');
Route::post('/labthree', [LabThreeController::class, 'labThree'])->name('labThree.post');
Route::post('/create-user', [LabThreeController::class, 'createUser'])->name('createUser');
Route::post('/create-country', [LabThreeController::class, 'createCountry'])->name('createCountry');
Route::post('/leap-year', [LabTwoController::class, 'leapYear']);
Route::post('/hours-from-degrees', [LabTwoController::class, 'hoursFromDegrees']);
Route::post('/generate-random-string', [LabTwoController::class, 'generateRandomString']);
Route::post('/substring', [LabTwoController::class, 'substring']);
Route::post('/random-line-to-file', [LabTwoController::class, 'randomLineToFile']);
Route::get('/calculate', [LabThreeController::class, 'calculate'])->name('calculate');

Route::get('/author', [AuthorController::class, 'index'])->name('author');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/{id}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/author/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');

Route::get('/labfour', [LabFourController::class, 'index'])->name('labFour');
Route::get('/labfour/create', [LabFourController::class, 'create'])->name('labfour.create');
Route::post('/labfour', [LabFourController::class, 'store'])->name('labfour.store');
Route::get('/labfour/{id}', [LabFourController::class, 'show'])->name('labfour.show');
Route::get('/labfour/{id}/edit', [LabFourController::class, 'edit'])->name('labfour.edit');
Route::put('/labfour/{id}', [LabFourController::class, 'update'])->name('labfour.update');
Route::delete('/labfour/{id}', [LabFourController::class, 'destroy'])->name('labfour.destroy');
Route::post('/labfour/showBooks', [LabFourController::class, 'showBooks'])->name('labfour.showBooks');
Route::get('/minMaxPages', [LabFourController::class, 'minMaxPages'])->name('minMaxPages');
Route::get('/showBookWithMaxLengthName', [LabFourController::class, 'showBookWithMaxLengthName'])->name('showBookWithMaxLengthName');
Route::get('/perauthor', [LabFourController::class, 'booksPerAuthor'])->name('perauthor');
Route::get('/byletter', [LabFourController::class, 'authorsByFirstLetter'])->name('byletter');
Route::get('/surnameko', [LabFourController::class, 'authorsWithSurnameEndingInKo'])->name('surnameko');
Route::get('/birthday', [LabFourController::class, 'authorsWithBirthdayToday'])->name('birthday');
Route::get('/booksyearsago', [LabFourController::class, 'booksAddedMoreThan4YearsAgo'])->name('booksyearsago');
Route::get('/leapyearbooks', [LabFourController::class, 'leapYearBooks'])->name('leapyearbooks');
Route::get('/sincecreation', [LabFourController::class, 'yearsSinceCreation'])->name('sincecreation');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
