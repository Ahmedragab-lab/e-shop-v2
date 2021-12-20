<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Route::name('admin.')->prefix('admin')->group(function () {

        route::resource('dashboard',DashboardController::class);
        // route::resource('user',UserController::class);
        Route::get('data','UserController@data')->name('data');
        Route::resource('user', 'UserController');  // route user by yagra
        
        Route::resource('user2', 'User2Controller');  // route user crud

    // });
});

// require __DIR__.'/auth.php';
