<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// route::group([namespace=>Admin],function(){

// })

// route::resource('dashboard',Admin\DashboardController::class);

require __DIR__.'/auth.php';
