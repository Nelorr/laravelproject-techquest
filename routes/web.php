<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;7

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
Route::middleware(['auth'])->group(function{

    Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@index')->middleware('role:admin');     
    Route::get('/dashboard/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware('role:user');
    Route::get('/admin/staffs', [AdminController::class, 'users']);

});

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/dashboard/dashboard', function () {
//     return view('/dashboard/dashboard');
// });
// Route::get('/dashboard/staffs', function () {
//     return view('/dashboard/staffs');
// });

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
