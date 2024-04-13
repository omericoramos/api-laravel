<?php

use App\Http\Controllers\api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::get('/user/{user}', [UserController::class,'show'])->name('users.show');
    Route::get('/user/edit/{user}', [UserController::class,'edit'])->name('users.edit');
    Route::put('/user/update/{user}', [UserController::class,'update'])->name('users.update');
    Route::delete('/user/{user}', [UserController::class,'destroy'])->name('users.destroy');
    Route::post('/user', [UserController::class,'store'])->name('users.store');
});