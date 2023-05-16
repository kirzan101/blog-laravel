<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\AccountabilityController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
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
Route::resource('/usergroup', UserGroupController::class, ['except' => ['create', 'edit']]);
Route::resource('/accountability', AccountabilityController::class, ['except' => ['create', 'edit']]);
Route::resource('/stocks', StockController::class, ['except' => ['create', 'edit']]);
Route::resource('/departments', DepartmentController::class, ['except' => ['create', 'edit']]);
Route::resource('/teachers', TeacherController::class, ['except' => ['create', 'edit']]);
