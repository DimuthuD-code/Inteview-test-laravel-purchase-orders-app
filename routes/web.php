<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');

Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');

Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::get('dashboard',[CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::get('zone', [ZoneController::class, 'index'])->name('zone');

Route::get('zone/fetchall', [ZoneController::class, 'fetch_all'])->name('zone.fetchall');

Route::get('zone/add', [ZoneController::class, 'add'])->name('zone.add');

Route::post('zone/add_validation', [ZoneController::class, 'add_validation'])->name('zone.add_validation');

Route::get('zone/edit/{id}', [ZoneController::class, 'edit'])->name('edit');

Route::post('zone/edit_validation', [ZoneController::class, 'edit_validation'])->name('zone.edit_validation');

Route::get('zone/delete/{id}', [ZoneController::class, 'delete'])->name('delete');


Route::get('region', [RegionController::class, 'index'])->name('region');

Route::get('region/fetchall', [RegionController::class, 'fetch_all'])->name('region.fetchall');

Route::get('region/add', [RegionController::class, 'add'])->name('region.add');

Route::post('region/add_validation', [RegionController::class, 'add_validation'])->name('region.add_validation');

Route::get('region/edit/{id}', [RegionController::class, 'edit'])->name('region.edit');

Route::post('region/edit_validation', [RegionController::class, 'edit_validation'])->name('region.edit_validation');

Route::get('region/delete/{id}', [RegionController::class, 'delete'])->name('delete');



Route::get('territory', [TerritoryController::class, 'index'])->name('territory');

Route::get('territory/fetchall', [TerritoryController::class, 'fetch_all'])->name('territory.fetchall');

Route::get('territory/add', [TerritoryController::class, 'add'])->name('territory.add');

Route::get('territory/getregion', [TerritoryController::class, 'getregion'])->name('territory.getregion');

Route::post('territory/add_validation', [TerritoryController::class, 'add_validation'])->name('territory.add_validation');

Route::get('territory/edit/{id}', [TerritoryController::class, 'edit'])->name('territory.edit');

Route::post('territory/edit_validation', [TerritoryController::class, 'edit_validation'])->name('territory.edit_validation');

Route::get('territory/delete/{id}', [TerritoryController::class, 'delete'])->name('delete');


Route::get('users', [UserController::class, 'index'])->name('users');

Route::get('users/fetch_all', [UserController::class, 'fetch_all'])->name('users.fetch_all');

Route::get('users/add', [UserController::class, 'add'])->name('users.add');

Route::post('users/add_validation', [UserController::class, 'add_validation'])->name('users.add_validation');

Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

Route::post('users/edit_validation', [UserController::class, 'edit_validation'])->name('users.edit_validation');

Route::get('users/delete/{id}', [UserController::class, 'delete'])->name('delete');


Route::get('product', [ProductController::class, 'index'])->name('product');

Route::get('product/fetch_all', [ProductController::class, 'fetch_all'])->name('product.fetch_all');

Route::get('product/add', [ProductController::class, 'add'])->name('product.add');

Route::post('product/add_validation', [ProductController::class, 'add_validation'])->name('product.add_validation');

Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::post('product/edit_validation', [ProductController::class, 'edit_validation'])->name('product.edit_validation');

Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('delete');


Route::get('po', [PoController::class, 'index'])->name('po');

Route::get('po/add', [PoController::class, 'add'])->name('po.add');

Route::get('po/getterritory', [PoController::class, 'getterritory'])->name('po.getterritory');

Route::get('po/getdistributor', [PoController::class, 'getdistributor'])->name('po.getdistributor');

Route::get('po/add_validation', [PoController::class, 'add_validation'])->name('po.add_validation');

Route::get('po/view/{id}', [PoController::class, 'view'])->name('po.view');

Route::get('po/export_purchase_order', [PoController::class, 'export_purchase_order'])->name('po.export_purchase_order');

Route::get('po/invoiceGenarate', [PoController::class, 'invoiceGenarate'])->name('po.invoiceGenarate');
