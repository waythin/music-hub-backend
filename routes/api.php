<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\EnrollmentController;

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



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    
    // post submit 
    Route::post('post/submit', [PostController::class, 'store']);
    Route::get('post/list', [PostController::class, 'index']);


    // Enroll by students 
    Route::post('enroll/post', [EnrollmentController::class, 'enroll']);

    // instructor change the status
    Route::patch('enroll/status/{id}', [EnrollmentController::class, 'updateEnrollStatus']);
    // enrolled student list 
    Route::get('enrollments', [EnrollmentController::class, 'listStudents']);
    

    // Sessions
    Route::resource('sessions', SessionController::class)->only(['index', 'store']);
});