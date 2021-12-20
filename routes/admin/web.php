<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Route::name('admin.')->prefix('admin')->group(function () {

        route::resource('dashboard',DashboardController::class);
        Route::resource('user', 'UserController');  // route user by yagra in one page

        Route::resource('user2', 'User2Controller');  // route user crud

        route::resource('user3',User3Controller::class);  // route user by yagra
        Route::get('data','User3Controller@data')->name('data');

    // });
});

// require __DIR__.'/auth.php';
