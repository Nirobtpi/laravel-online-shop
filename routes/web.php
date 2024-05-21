<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

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
});
Route::group(['prefix' => 'admin'], function(){
    Route::get('/login',[AdminController::class,'login'])->name('admin.login');
    Route::post('/login',[AdminController::class,'adminLogin'])->name('admin.adminlogin');

    Route::group(['middleware'=>['admin']], function(){
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
        Route::get('/update-password',[AdminController::class,'update'])->name('admin.update_password');
        Route::post('/update-admin-password/{id}',[AdminController::class,'updatePassword'])->name('admin.updatePassword');
        Route::get('update-admin-details',[AdminController::class,'updateAdminDetails'])->name('admin.update_admin_details');
        Route::post('update-admin-details/{id}',[AdminController::class,'updateAdminData'])->name('admin.update_admin_data');
    });
});
Route::get('file',[AdminController::class,'filelink']);
Route::post('file',[AdminController::class,'file']);

