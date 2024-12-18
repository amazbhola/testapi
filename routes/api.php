<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\RolePermissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\WithoutApiTender;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');





Route::post('register', [AuthController::class, 'signUp']);

Route::post('login', [AuthController::class, 'signIn']);

Route::get('alltender', [WithoutApiTender::class, 'allTender']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'signOut']);
    Route::resource('student', StudentController::class);
    Route::resource('role', RolePermissionController::class);
    Route::resource('tender',TenderController::class);
});


