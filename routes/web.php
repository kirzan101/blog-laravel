<?php

use App\Http\Controllers\AccountabilityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserGroupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::resource('/departments', DepartmentController::class);
    Route::resource('/items', ItemController::class);
    Route::resource('/stocks', StockController::class, ['except' => ['index', 'create']]);
    Route::get('/stocks/create/{item_id}', [StockController::class, 'create']);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/accountabilities', AccountabilityController::class);
    Route::resource('/usergroups', UserGroupController::class);
    Route::resource('/employees', EmployeeController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
