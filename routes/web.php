<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopeController;
use App\Http\Controllers\Dashboard\DashboardController;


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
    return view('Zay.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get ('home',[ShopeController::class , 'index'] )->name('home.index');
Route::get ('about',[ShopeController::class , 'about'] )->name('about');
Route::get ('contact',[ShopeController::class , 'contact'] )->name('contact');
Route::get ('shop',[ShopeController::class , 'shop'] )->name('shop');
Route::get ('shopDetails',[ShopeController::class , 'shopSingle'] )->name('shopSingle');



// ===============================dashboard routs =============================

Route::prefix('dashboardPanel')->middleware(['auth','checkAdmin'])->name('dashboard.')->group(function(){

Route::get ('/',[DashboardController::class,'index'] )->name('index');



});
