<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClockingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

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
    return view('login');
});

Route::get('insert', [ClockingController::class, 'Insert']);
Route::post('save-employee', [ClockingController::class,'SaveEmployee']);
Route::get('login', [ClockingController::class, 'Login'])->name('login');

Route::post('login-user', [ClockingController::class,'CheckLogin2'])->name('login-user');
Route::post('login-user2', [ClockingController::class, "CheckLogin"])->name('login-user2');

//Route for logging out
// Route::get('logout', [ClockingController::class, "logout"])->name('logout');
//Route to the users dashboard
Route::get('dashboard', [ClockingController::class, 'Userboard']);
Route::get('main-dash', [ClockingController::class, 'MainDashboard']);

//Retrieving data from the database
Route::get('list-employee', [ClockingController::class, 'ListEmployee'])->name('list-employee');
Route::get('list-user', [ClockingController::class, 'ListUser'])->name('list-user');

//retrieving data using ajax
// Route::get('normal-users', [UserController::class, 'getNormalUsers']);

//route for a single normal user
Route::get('user', [ClockingController::class, 'NormalUser'])->name('user');

//delete user
Route::get('delete/{user_id}', [ClockingController::class, 'DeleteUser']);

//edit employee info
Route::get('view-employee/{user_id}', [ClockingController::class, 'ViewEmployeeData']);
Route::post('edit-employee', [ClockingController::class, 'editEmployee']);

//roure for viewing data when admin clicks on report
Route::get('list-users', [ClockingController::class, 'AdminListUser']);
Route::get('view-each/{id}', [ClockingController::class, 'ViewEach'])->name('view_each');


//PART TWO OF LOGIC
//inserting data into the database
Route::post('add-employee', [MainController::class, 'SaveEmployee']);
//fetching data from timein table and timeout tables using foreign key
Route::get('view-info', [MainController::class, 'GetUsers'])->name('view-info');

//retrieving data for a single user
Route::get('view-user-data', [ClockingController::class, 'SingleUser']);
Route::get('view-user-info', [MainController::class, 'ListUser'])->name('view-user-info');

//deleting a user
Route::get('delete/{user_id}', [MainController::class, 'DeleteUser']);

//viewing logs for all users
Route::get('view-all-logs', [MainController::class, 'GetData'])->name('view-all-logs');

//initialing and destroying the datatables
Route::get('show-logs/{user_id}', [MainController::class, 'InitializeTable']);

//route for logout
Route::get('log-out', [MainController::class, 'LogOut'])->name('log-out');




