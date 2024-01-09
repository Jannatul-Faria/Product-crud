<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Laravel\Sanctum\Sanctum;

 Route::view('/', 'backend.Pages.dashboard.dashboard')->name('dashboard');
// Web Api Routes:
Route::post("/userRegistation", [UserController::class, 'userRegistation']);
Route::post("/userLogin", [UserController::class, 'userLogin']);
Route::get("/userProfile", [UserController::class, 'userProfile'])->middleware('auth:sanctum');// protected route
Route::get("/logOut", [UserController::class, 'logOut'])->middleware('auth:sanctum');// protected route
Route::post("/userUpdate", [UserController::class, 'userUpdate'])->middleware('auth:sanctum');// protected route












// Page Routes:
Route::view('/login', 'backend.Pages.auth.login')->name('login');
Route::view('/userRegistation', 'backend.Pages.auth.register')->name('register');
Route::view('/reset', 'backend.Pages.auth.reset');
Route::view('/sendOtp', 'backend.Pages.auth.send-otp');
Route::view('/varifyOtp', 'backend.Pages.auth.varify-otp');
Route::view('/userProfile', 'backend.Pages.dashboard.profile')->name('profile');








// Table route:
Route::group(['prefix'=>'admin', 'as' => 'admin.'], function () {
   
    Route::get('/tasks', [TableController::class, 'task'])->name('tasks');
    Route::get('/sold', [TableController::class, 'sold'])->name('sold');
    Route::get('/add', [TableController::class, 'add'])->name('add');
    Route::post('/store', [TableController::class, 'store'])->name('store');
    
    Route::get('/forms', [TableController::class, 'forms'])->name('forms');
    Route::get('/tables', [TableController::class, 'tables'])->name('tables');

    Route::get('/sell/{id?}', [TableController::class, 'sell'])->name('sell');
     Route::post('/soldStore/{id}', [TableController::class, 'selsStore'])->name('soldStore');
    Route::get('/edit/{id}', [TableController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TableController::class, 'update'])->name('update');
    
    Route::delete('/delete/{id}', [TableController::class, 'delete'])->name('delete');

   
});