<?php

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
});
