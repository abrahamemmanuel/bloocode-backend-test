<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('job-roles')->group(function () {
    Route::post('/', [AdminController::class, 'createJobRole']);
    Route::delete('/{id}', [AdminController::class, 'deleteJobRole']);
    Route::get('/{id}', [AdminController::class, 'getJobRole']);
    Route::get('/', [AdminController::class, 'getAllJobRoles']);
});

Route::prefix('employees')->group(function () {
    Route::get('/', [AdminController::class, 'getAllEmployees']);
    Route::post('/', [AdminController::class, 'createEmployee']);
    Route::put('/{id}', [AdminController::class, 'updateEmployee']);
    Route::delete('/{id}', [AdminController::class, 'deleteEmployee']);
    Route::get('/{id}/details', [AdminController::class, 'getEmployee']);
});
