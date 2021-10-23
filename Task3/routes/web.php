<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\EmployerController;
use App\http\controllers\LoginController;
use App\http\controllers\CorporateUpdateController;
use App\http\controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[EmployerController::class,'Home'])->name('Home');

Route::get('/Registration/Handle',[EmployerController::class,'RegistrationHandle'])->name('RegistrationHandle');

Route::get('/Corporate/Registration',[EmployerController::class,'Registration'])->name('Registration');

Route::post('/Registrationubmit',[EmployerController::class,'RegistrationSubmit'])->name('RegistrationSubmit');



Route::get('/dashboard',[EmployerController::class,'Dashboard'])->name('Dashboard')->middleware('ValidCorporateEmployer');


Route::get('/login',[LoginController::class,'login'])->name('login');

Route::post('/login',[LoginController::class,'loginsubmit'])->name('loginsubmit');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/CorporateDashboard',[LoginController::class,'corporateDash'])->name('corporateDash');

Route::get('/AdminDash',[LoginController::class,'AdminDash'])->name('AdminDash');


Route::get('/Corporate/update/{id}/{name}/',[CorporateUpdateController::class,'update'])->name('update');

Route::post('/Corporate/update/',[CorporateUpdateController::class,'UpdateSubmit'])->name('updatesubmit');

Route::get('/admin/registration/',[AdminController::class,'Registration'])->name('admin.registration');

Route::post('/admin/registration/',[AdminController::class,'RegistrationSubmit'])->name('admin.registrationsubmit');

Route::get('/Admin/update/{id}/{name}/',[AdminController::class,'update'])->name('AdminUpdateProfile');

Route::post('/Admin/update/',[AdminController::class,'UpdateSubmit'])->name('AdminProfileUpdateSubmit');

Route::get('/Admin/User/List',[AdminController::class,'UserList'])->name('userList');

Route::get('/Admin/User/Edit/{id}/{name}/',[AdminController::class,'UserEdit'])->name('UserEdit');

Route::post('/Admin/Edit/User/',[AdminController::class,'UserEditSubmit'])->name('UserEditSubmit');

Route::get('/Admin/User/Delete/{id}/{name}/',[AdminController::class,'UserDelete'])->name('UserDelete');
