<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\ComplaintController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;

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
// })->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('proses.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister'])->name('proses.register');

Route::get('/', [PengaduanController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'rolecheck:admin,petugas']], function() {
    Route::get('admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('/admin/pengaduan', [ComplaintController::class, 'index'])->name('complaint');
    Route::get('/admin/pengaduan/{id}', [ComplaintController::class, 'show'])->name('complaint.show');
    Route::post('/admin/pengaduan/{id}', [ComplaintController::class, 'tanggapanHandle'])->name('complaint.tanggapan');
    Route::get('/admin/pengaduan/{id}/setStatus', [ComplaintController::class, 'setStatus'])->name('complaint.setstatus');
    Route::get('/admin/users', [DashboardController::class, 'user'])->name('admin.user');
});

Route::get('/admin/pengaduan/{id}/generate', [ComplaintController::class, 'generatePDF'])->middleware('auth', 'rolecheck:admin')->name('complaint.generate');

Route::get('/admin/user/register', [AuthController::class, 'adminRegister'])->middleware('auth', 'rolecheck:admin')->name('admin.register');
Route::post('/admin/user/register', [AuthController::class, 'handleAdminRegister'])->middleware('auth', 'rolecheck:admin')->name('admin.prosesregister');

Route::group(['middleware' => ['auth', 'rolecheck:user']], function() {
    Route::get('/pengaduan', [PengaduanController::class, 'pengaduan'])->name('pengaduan');
    Route::post('/cari-pengaduan', [PengaduanController::class, 'searchHandle'])->name('pengaduan.search');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan/create', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
});
