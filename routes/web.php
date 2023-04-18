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
    Route::get('equipment-add', [EquipmentController::class, 'add']);
    Route::post('equipment-add', [EquipmentController::class, 'loan']);
    Route::get('equipment-edit/{slug}', [EquipmentController::class, 'edit']);
    Route::post('equipment-edit/{slug}', [EquipmentController::class, 'update']);
    Route::get('equipment-delete/{slug}', [EquipmentController::class, 'delete']);
    Route::get('equipment-destroy/{slug}', [EquipmentController::class, 'destroy']);
    Route::get('equipment-deleted', [EquipmentController::class, 'deletedEquipment']);
    Route::get('equipment-restore/{slug}', [EquipmentController::class, 'restore']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'add']);
    Route::post('category-add', [CategoryController::class, 'loan']);
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
    Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
    Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
    Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
    Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('registered-users', [UserController::class, 'registeredUser']);
    Route::get('user-detail/{slug}', [UserController::class, 'show']);
    Route::get('user-approve/{slug}', [UserController::class, 'approve']);
    Route::get('user-ban/{slug}', [UserController::class, 'delete']);
    Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
    Route::get('user-banned', [UserController::class, 'bannedUser']);
    Route::get('user-restore/{slug}', [UserController::class, 'restore']);

    Route::get('loan-logs', [LoanLogController::class, 'index']);
});