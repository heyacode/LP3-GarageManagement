<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\VehicleController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [DashboardController::class, 'admin'])->name('admin.admin');
        Route::get('/admin/clients', [UserController::class, 'clientlist'])->name('admin.clientlist');
        Route::get('/admin/mechanics', [UserController::class, 'mechaniclist'])->name('admin.mechaniclist');
        Route::get('/admin/vehicles', [VehicleController::class, 'vehiclelist'])->name('admin.vehiclelist');
        Route::get('/admin/invoices', [InvoiceController::class, 'invoicelist'])->name('admin.invoicelist');
        Route::get('/admin/repairs', [RepairController::class, 'repairlist'])->name('admin.repairlist');
        Route::get('/admin/spareparts', [SparePartController::class, 'sparepartslist'])->name('admin.sparepartslist');
        Route::resource('clients', UserController::class);
        Route::resource('vehicles', VehicleController::class);
        Route::get('admin/createuser', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('admin/createsparepart', [SparepartController::class, 'create'])->name('spareparts.create');
        Route::post('admin/spareparts', [SparepartController::class, 'store'])->name('spareparts.store');
        // Autres routes pour administrateurs
    });

    Route::middleware(['role:mechanic'])->group(function () {
        Route::get('/mechanic/dashboard', [DashboardController::class, 'mechanic'])->name('mechanic.mechanic');
        // Autres routes pour mécaniciens
    });

    Route::middleware(['role:client'])->group(function () {
        Route::get('/client/dashboard', [DashboardController::class, 'client'])->name('client.client');
        // Autres routes pour clients
    });
});
