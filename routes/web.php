<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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

Route::get('/route-cache', function() {
    Artisan::call('route:cache');
  
    dd("Route cache clear");
});

Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');
  
    dd("Cache clear All");
});

Route::get('/link', function(){
	Artisan::call('storage:link');
	
	dd("Terkoneksi");
});


Route::get('/', [DashboardController::class, 'landingpage']);

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/register', function () {return view('dashboard.register'); })->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login-proses', [LoginController::class, 'ceklogin']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/todashboard', [LoginController::class, 'todashboard'])->middleware('auth');

Route::get('/profile', function () {return view('dashboard.profile'); })->middleware('auth');


// route user
Route::get('/home', [DashboardController::class, 'index'])->middleware('auth', 'CekRole:user');

Route::get('/data-kelas', [DashboardController::class, 'datakelas'])->middleware('auth');

Route::get('/status-pendaftaran', [DashboardController::class, 'statuspendaftaran'])->middleware('auth');

Route::get('/kelas-saya', [DashboardController::class, 'kelassaya'])->middleware('auth');



//trainer
Route::get('/home-trainer', [DashboardController::class, 'hometrainer'])->middleware('auth', 'CekRole:anggota');

Route::get('/kelas-trainer', function () {return view('dashboard.trainer.kelastrainer'); })->middleware('auth', 'CekRole:anggota');

Route::get('/data-pendaftaran-trainer', function () {return view('dashboard.trainer.pendaftaran'); })->middleware('auth', 'CekRole:anggota');




//dashboard superadmin
Route::get('/data-pendaftaran', [DashboardController::class, 'datapendaftaran'])->middleware('auth', 'CekRole:superadmin');

Route::get('/superadmin', [DashboardController::class, 'index'])->middleware('auth', 'CekRole:superadmin');

Route::get('/data-user', [DashboardController::class, 'datauser'])->middleware('auth', 'CekRole:superadmin');

Route::get('/project-list', [DashboardController::class, 'project'])->middleware('auth', 'CekRole:superadmin');

Route::get('/taskboard-list', [DashboardController::class, 'taskboardlist'])->middleware('auth', 'CekRole:superadmin');

Route::get('/app-taskboard/{project:uuid}', [DashboardController::class, 'taskboard'])->middleware('auth', 'CekRole:superadmin');

Route::post('/task-proses', [DashboardController::class, 'prosestask'])->middleware('auth', 'CekRole:superadmin');

Route::post('/to-progress/{taskboard:id}', [DashboardController::class, 'toprogress'])->middleware('auth', 'CekRole:superadmin');

Route::post('/completed/{taskboard:id}', [DashboardController::class, 'completed'])->middleware('auth', 'CekRole:superadmin');

Route::post('/delete-task/{taskboard:id}', [DashboardController::class, 'deletetask'])->middleware('auth', 'CekRole:superadmin');

Route::get('/data-kelas-user', [DashboardController::class, 'datakelasuser'])->middleware('auth', 'CekRole:superadmin');


