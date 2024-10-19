<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;

Route::prefix('cp')->group(function () {
    Route::get('', [MainController::class, 'index'])
        ->name('admin');

    Route::get('users', [MainController::class, 'users'])
        ->name('admin.users');

    Route::get('roles', [MainController::class, 'users'])
        ->name('admin.roles');
});
