<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;



 Route::view('/', 'backend.admin')->name('dashboard');

// Table route:
Route::group(['prefix'=>'admin', 'as' => 'admin.'], function () {
   
    Route::get('/tasks', [TableController::class, 'task'])->name('tasks');
    Route::get('/sold', [TableController::class, 'sold'])->name('sold');
    Route::get('/add', [TableController::class, 'add'])->name('add');
    Route::post('/store', [TableController::class, 'store'])->name('store');
    
    Route::get('/forms', [TableController::class, 'forms'])->name('forms');
    Route::get('/login', [TableController::class, 'login'])->name('login');
    Route::get('/profile', [TableController::class, 'profile'])->name('profile');
    Route::get('/register', [TableController::class, 'register'])->name('register');
    Route::get('/reset', [TableController::class, 'reset'])->name('reset');
    Route::get('/tables', [TableController::class, 'tables'])->name('tables');

    Route::get('/sell/{id?}', [TableController::class, 'sell'])->name('sell');
     Route::post('/soldStore/{id}', [TableController::class, 'selsStore'])->name('soldStore');
    Route::get('/edit/{id}', [TableController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TableController::class, 'update'])->name('update');
    
    Route::delete('/delete/{id}', [TableController::class, 'delete'])->name('delete');
});


