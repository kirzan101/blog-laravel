<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\UserGroupController;
use App\Http\Controllers\Api\AccountabilityController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('/posts', PostController::class, ['except' => ['create', 'edit']]);
Route::resource('/items', ItemController::class, ['except' => ['create', 'edit']]);
Route::resource('/comments', CommentController::class, ['except' => ['create', 'edit']]);
Route::resource('/suppliers', SupplierController::class, ['except' => ['create', 'edit']]);
Route::resource('/employees', EmployeeController::class, ['except' => ['create', 'edit']]);
Route::resource('/usergroups', UserGroupController::class, ['except' => ['create', 'edit']]);
Route::resource('/accountabilities', AccountabilityController::class, ['except' => ['create', 'edit']]);
Route::resource('/stocks', StockController::class, ['except' => ['create', 'edit']]);
Route::resource('/departments', DepartmentController::class, ['except' => ['create', 'edit']]);
Route::resource('/teachers', TeacherController::class, ['except' => ['create', 'edit']]);