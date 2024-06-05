<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SparePartController;

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
    return view('auth.login');
});
//Authentification
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [DashboardController::class, 'admin'])->name('admin.astats');
        //Client
        Route::get('admin/clients',[ClientController::class,'index'])->name('admin.client');
        Route::post('admin/clients/add',[ClientController::class,'addClient'])->name('addClient');
        Route::post('admin/clients/update',[ClientController::class,'updateClient'])->name('updateClient');
        Route::delete('admin/clients/delete',[ClientController::class,'deleteClient'])->name('deleteClient');
        Route::post('admin/clients/show',[ClientController::class,'showClient'])->name('showClient');
        //Mechanic
        Route::get('admin/mechanics',[MechanicController::class,'index'])->name('admin.mechanic');
        Route::post('admin/mechanics/add',[MechanicController::class,'addMechanic'])->name('addMechanic');
        Route::post('admin/mechanics/update',[MechanicController::class,'updateMechanic'])->name('updateMechanic');
        Route::delete('admin/mechanics/delete',[MechanicController::class,'deleteMechanic'])->name('deleteMechanic');
        Route::post('admin/mechanics/show',[MechanicController::class,'showMechanic'])->name('showMechanic');
        //SparePart
        Route::get('admin/spareparts',[SparePartController::class,'index'])->name('admin.sparepart');
        Route::post('admin/spareparts/add',[SparePartController::class,'addSparepart'])->name('addSparepart');
        Route::post('admin/spareparts/update',[SparePartController::class,'updateSparepart'])->name('updateSparepart');
        Route::delete('admin/spareparts/delete',[SparePartController::class,'deleteSparepart'])->name('deleteSparepart');
        Route::post('admin/spareparts/show',[SparePartController::class,'show'])->name('show');
        //Repair
        Route::get('admin/repairs', [RepairController::class, 'index'])->name('admin.repair');
        //vehicle
        Route::get('admin/vehicles',[VehicleController::class,'index'])->name('admin.vehicle');
        Route::post('admin/vehicles/add',[VehicleController::class,'addVehicle'])->name('addVehicle');
        Route::post('admin/vehicles/update',[VehicleController::class,'updateVehicle'])->name('updateVehicle');
        Route::delete('admin/vehicles/delete',[VehicleController::class,'deleteVehicle'])->name('deleteVehicle');
        Route::post('admin/vehicles/show',[VehicleController::class,'showVehicle'])->name('showVehicle');
        //invoice
        Route::get('admin/invoices',[InvoiceController::class,'index'])->name('admin.invoice');
        Route::post('admin/invoices/add',[InvoiceController::class,'addInvoice'])->name('addInvoice');
        Route::post('admin/invoices/update',[InvoiceController::class,'updateInvoice'])->name('updateInvoice');
        Route::delete('admin/invoices/delete',[InvoiceController::class,'deleteInvoice'])->name('deleteInvoice');
        Route::post('admin/invoices/show',[InvoiceController::class,'showInvoice'])->name('showInvoice');
        //client Routes

    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware(['role:client'])->group(function () {
        Route::get('/client', [DashboardController::class, 'client'])->name('stats.cstats');
        Route::get('client/profil', [ClientController::class, 'profilClient'])->middleware('auth')->name('profilClient');
        Route::post('client/profil/update',[ClientController::class,'updateProfil'])->name('updateProfil');

        // Route::get('client/editClient', [ClientController::class, 'edit'])->name('editClient');
        // Route::post('client/updateClient', [ClientController::class, 'update'])->name('updateProfil');

            // Autres routes pour clients
        });

    Route::middleware(['role:mechanic'])->group(function () {
        Route::get('/mechanic', [DashboardController::class, 'mechanic'])->name('stats.mstats');
        Route::get('mechanic/profil', [MechanicController::class, 'profilMechanic'])->middleware('auth')->name('profilMechanic');
        Route::post('mechanic/profil/update',[MechanicController::class,'updateProfilMechanic'])->name('updateProfilMechanic');
        // Autres routes pour mécaniciens
    });


});
