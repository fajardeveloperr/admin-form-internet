<?php

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\NewCustomerController;
use App\Http\Controllers\User\OldCustomerController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Superadmin\InternetComponent;
use App\Http\Livewire\Sales\SalesComponent;
use App\Http\Livewire\Superadmin\PenggunaComponent;

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

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/new-member', [HomeController::class, 'newcustomerclass']);
// Route::get('/new-member/personal/{id_customer}', [NewCustomerController::class, 'indexPersonal']);
// Route::post('/new-member/personal', [NewCustomerController::class, 'storePersonal']);
// Route::get('/new-member/bussiness/{id_customer}', [NewCustomerController::class, 'indexBussiness']);
// Route::post('/new-member/bussiness/', [NewCustomerController::class, 'storeBussiness']);
// Route::get('/old-member', [OldCustomerController::class, 'index']);
// Route::post('/old-member/{class_customer}/{id_customer}', [OldCustomerController::class, 'showDataCustomer']);

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum','verified'])->group(function ()
{
    Route::get('/home', HomeComponent::class)->name('home');
    Route::get('/customer', InternetComponent::class)->name('customer');
    // Route::get('/pengguna', PenggunaComponent::class)->name('pengguna');
    // Route::get('/customer', InternetComponent::class)->name('customer');
});

// Role Superadmin //
// Route::middleware(['auth:sanctum','auth.master','verified'])->group(function()
// {
//     Route::get('/dashboard', HomeComponent::class)->name('dashboard');
//     Route::get('/customer', InternetComponent::class)->name('customer');

// });


// // Role Sales //
// Route::middleware(['auth:sanctum','auth.sales','verified'])->group(function()
// {
//     Route::get('/dashboard', HomeComponent::class)->name('dashboard');
//     Route::get('/customer', SalesComponent::class)->name('customer');

// });


// Role Manager //
// Route::middleware(['auth:sanctum','auth.manager','verified'])->group(function()
// {
    // Route::get('dashboard', HomeComponent::class)->name('dashboard');


// });




