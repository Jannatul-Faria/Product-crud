<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Backend\AlbumController;
use App\Http\Controllers\Backend\PhotoController;

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


// admin route:
Route::group(['prefix'=>'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/tasks', [AdminController::class, 'task'])->name('tasks');
      


     Route::get('/sold', [AdminController::class, 'sold'])->name('sold');
    Route::get('/add', [AdminController::class, 'add'])->name('add');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    
    Route::get('/forms', [AdminController::class, 'forms'])->name('forms');
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/register', [AdminController::class, 'register'])->name('register');
    Route::get('/reset', [AdminController::class, 'reset'])->name('reset');
    Route::get('/tables', [AdminController::class, 'tables'])->name('tables');

    Route::get('/sell/{id?}', [AdminController::class, 'sell'])->name('sell');
     Route::post('/soldStore/{id}', [AdminController::class, 'selsStore'])->name('soldStore');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
   

});
