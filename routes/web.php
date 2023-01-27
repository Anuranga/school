<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::prefix('users')->group(function (){
    Route::get('/user/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/user/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/user/store', [UserController::class, 'Userstore'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
});

// User Profile & Password
Route::prefix('profile')->group(function (){
    Route::get('/profile/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/profile/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/profile/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/profile/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/profile/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});
