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

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('admin/clients', UserController::class);
// });

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

        // Route::get('admin/clients', [ClientController::class, 'index'])->name('admin.client.index');
        // Route::post('admin/clients/show', [ClientController::class, 'show'])->name('admin.client.show');
        // Route::post('admin/clients/delete', [ClientController::class, 'delete'])->name('client.delete');
        // Route::get('admin/clients/create', [ClientController::class, 'create'])->name('admin.client.create');
        // Route::post('admin/clients/store', [ClientController::class, 'store'])->name('admin.client.store');
        // Route::resource('client', ClientController::class);
        //Mechanic
        // Route::get('admin/mechanics', [MechanicController::class, 'index'])->name('admin.mechanic.index');
        // Route::post('admin/mechanics/show', [MechanicController::class, 'show'])->name('admin.mechanic.show');
        // Route::get('admin/mechanics/create', [MechanicController::class, 'create'])->name('admin.mechanic.create');
        // Route::post('admin/mechanics/store', [MechanicController::class, 'store'])->name('admin.mechanic.store');
        // Route::post('admin/mechanics/delete', [MechanicController::class, 'delete'])->name('mechanic.delete');
        // Route::resource('mechanic', MechanicController::class);


        // Route::resource('mecaniciens', MechanicController::class);


        //SparePart
        // Route::get('admin/spareparts', [SparePartController::class, 'index'])->name('admin.sparepart.index');
        // Route::post('admin/spareparts/show', [SparePartController::class, 'show'])->name('admin.sparepart.show');
        // Route::get('admin/spareparts/create', [SparePartController::class, 'create'])->name('admin.sparepart.create');
        // Route::post('admin/spareparts/store', [SparePartController::class, 'store'])->name('admin.sparepart.store');
        // Route::post('admin/spareparts/delete', [SparePartController::class, 'delete'])->name('sparepart.delete');
        // Route::resource('sparepart', SparePartController::class);
        //Vehicle
        // Route::get('admin/vehicles', [VehicleController::class, 'index'])->name('admin.vehicle.index');
        // Route::post('admin/vehicles/show', [VehicleController::class, 'show'])->name('admin.vehicle.show');
        // Route::get('admin/vehicles/create', [VehicleController::class, 'create'])->name('admin.vehicle.create');
        // Route::post('admin/vehicles/store', [VehicleController::class, 'store'])->name('admin.vehicle.store');
        // Route::post('admin/vehicles/delete', [VehicleController::class, 'delete'])->name('vehicle.delete');
        // Route::resource('vehicle', VehicleController::class);

        // Route::post('admin/repairs/show', [RepairController::class, 'show'])->name('admin.repair.show');
        // Route::get('admin/repairs/create', [RepairController::class, 'create'])->name('admin.repair.create');
        // Route::post('admin/repairs/store', [RepairController::class, 'store'])->name('admin.repair.store');
        // Route::post('admin/repairs/delete', [RepairController::class, 'delete'])->name('repair.delete');
        // Route::resource('repair', RepairController::class);
        //pdf
        // Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
    });

    Route::middleware(['role:mechanic'])->group(function () {
        Route::get('/mechanic', [DashboardController::class, 'mechanic'])->name('stats.mstats');
        // Autres routes pour mécaniciens
    });

    Route::middleware(['role:client'])->group(function () {
        Route::get('/client', [DashboardController::class, 'client'])->name('stats.cstats');
        // Autres routes pour clients
    });
});
