<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');





Route::post('signUp', [AuthController::class, 'signUp']);

Route::post('signIn', [AuthController::class, 'signIn']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('signOut', [AuthController::class, 'signOut']);
    Route::resource('student', StudentController::class);
});


