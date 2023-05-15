<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\StudentRegController;
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

// User Profile & Password
Route::prefix('setups')->group(function (){
    //Student Class Route
    Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
    Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');
    Route::get('student/class/edit/{i}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{i}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
    Route::get('student/class/delete/{i}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

    //Student Year Route
    Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
    Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');
    Route::get('student/year/edit/{i}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::post('student/year/update/{i}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');
    Route::get('student/year/delete/{i}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

    //Student Group Route
    Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
    Route::get('student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
    Route::post('student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('store.student.group');
    Route::get('student/group/edit/{i}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
    Route::post('student/group/update/{i}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('update.student.group');
    Route::get('student/group/delete/{i}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

    //Student Shift Route
    Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
    Route::get('student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
    Route::post('student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('store.student.shift');
    Route::get('student/shift/edit/{i}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
    Route::post('student/shift/update/{i}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('update.student.shift');
    Route::get('student/shift/delete/{i}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');

    //Fee Category Route
    Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');
    Route::get('fee/category/add', [FeeCategoryController::class, 'FeeCatAdd'])->name('fee.category.add');
    Route::post('fee/category/store', [FeeCategoryController::class, 'FeeCatStore'])->name('store.fee.category');
    Route::get('fee/category/edit/{i}', [FeeCategoryController::class, 'FeeCatEdit'])->name('fee.category.edit');
    Route::post('fee/category/update/{i}', [FeeCategoryController::class, 'FeeCatUpdate'])->name('update.fee.category');
    Route::get('fee/category/delete/{i}', [FeeCategoryController::class, 'FeeCatDelete'])->name('fee.category.delete');

    //Fee Category Amount Route
    Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('fee/amount/add', [FeeAmountController::class, 'FeeAmountAdd'])->name('fee.amount.add');
    Route::post('fee/amount/store', [FeeAmountController::class, 'FeeAmountStore'])->name('store.fee.amount');
    Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('update.fee.amount');
    Route::get('fee/amount/delete/{i}', [FeeAmountController::class, 'FeeAmountDelete'])->name('fee.amount.delete');
    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');

    // Exam Type Route
    Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
    Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('store.exam.type');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('update.exam.type');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

    // School Subject All Route
    Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');
    Route::get('school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');
    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('update.school.subject');
    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');

    //Assign Subject Route
    Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('assign/subject/add', [AssignSubjectController::class, 'AssignSubjectAdd'])->name('assign.subject.add');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'AssignSubjectStore'])->name('store.assign.subject');
    Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('update.assign.subject');
    Route::get('assign/subject/delete/{i}', [AssignSubjectController::class, 'AssignSubjectDelete'])->name('assign.subject.delete');
    Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetails'])->name('assign.subject.details');

    // Designation All Route
    Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
    Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');
    Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('designation.store');
    Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
    Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('update.designation');
    Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');

});

// Student Registration Routes
Route::prefix('students')->group(function (){
    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
    Route::get('/reg/Add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
    Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('student.registration.store');
    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
    Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
});
