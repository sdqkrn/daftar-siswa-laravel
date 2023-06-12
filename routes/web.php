<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
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

    $jumlahsiswa = Employee::count();
    $jumlahsiswalakilaki = Employee::where('jeniskelamin','laki-laki')->count();
    $jumlahsiswaperempuan = Employee::where('jeniskelamin','perempuan')->count();

    return view('welcome',compact('jumlahsiswa','jumlahsiswalakilaki','jumlahsiswaperempuan'));
});

Route::get('/siswa',[EmployeeController::class, 'index'])->name('siswa')->middleware('auth');

Route::get('/tambahsiswa',[EmployeeController::class, 'tambahsiswa'])->name('tambahsiswa');
Route::post('/insertdata',[EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[EmployeeController::class, 'updatedata'])->name('updatedata');


Route::get('/delete/{id}',[EmployeeController::class, 'delete'])->name('delete');

Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');