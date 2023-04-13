<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerprocess']);
});

Route::middleware('only_guest')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin');

    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::get('equipments', [EquipmentController::class, 'index']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'add']);
    Route::post('category-add', [CategoryContreller::class, 'loan']);
    Route::get('category-edit/{slug}', [CategoryContreller::class, 'edit']);
    Route::put('category-edit/{slug}', [CategoryContreller::class, 'update']);
    Route::get('category-delete/{slug}', [CategoryContreller::class, 'delete']);
    Route::get('category-destroy/{slug}', [CategoryContreller::class, 'destroy']);
    Route::get('category-deleted', [CategoryContreller::class, 'deletedCategory']);
    Route::get('category-restore/{slug}', [CategoryContreller::class, 'restore']);

    Route::get('users', [UserController::class, 'index']);

    Route::get('loan-logs', [LoanLogController::class, 'index']);
});