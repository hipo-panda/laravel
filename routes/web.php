<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;


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
    return view('./auth.home');
});

Route::get('/home', function () {
    return view('./auth.home');
});

Route::get('/list', function () {
    return view('./auth.foodlist');
});

Route::get('/recipe', function () {
    return view('./auth.recipeInfo');
});

Route::get('/recipeForm', function () {
    return view('./auth.recipe-form');
});



Route::post('/post', [BoardController::class, 'store']);



Route::get('/dashboard', function () {
    return view('auth.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/image/{board_id}', [BoardController::class, 'showImage']);
Route::get('/home', [BoardController::class, 'index'])->name('home');
Route::get('/search', [BoardController::class, 'search'])->name('search');
Route::get('/recipe/{board_id}', [BoardController::class, 'show'])->name('board.show');
Route::get('/board/edit/{board_id}', [BoardController::class, 'edit'])->name('board.edit');
Route::put('/boards/{board}', [BoardController::class, 'update']);
Route::delete('/boards/{board}', [BoardController::class, 'destroy']);

