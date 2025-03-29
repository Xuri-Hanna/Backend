<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DomainController;
use App\Http\Controllers\api\VpsController;
use App\Http\Controllers\api\HostingController;
use App\Http\Controllers\api\HostingAccountController;
use App\Http\Controllers\api\VpsAccountController;
use App\Http\Controllers\api\DomainAccountController;
use App\Http\Controllers\api\DiscountController;
use App\Http\Controllers\api\InvoiceController;
use App\Http\Controllers\api\KhachHangController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\Controller;
use App\Models\HostingAccount;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// PRODUCT
Route::apiResource('hostings',HostingController::class);
Route::get('/hosting_products', [HostingController::class, 'getHostingProducts']);
Route::apiResource('vps',VpsController::class);
Route::get('/vps_products', [VPSController::class, 'getVpsProducts']);
Route::apiResource('domains',DomainController::class);
Route::get('/domain_products', [DomainController::class, 'getDomainProducts']);

// ACCOUNT
Route::apiResource('hosting_accounts',HostingAccountController::class);
Route::apiResource('domain_accounts',DomainAccountController::class);
Route::apiResource('vps_accounts',VpsAccountController::class);

//MANAGER
Route::apiResource('discounts', DiscountController::class);
Route::get('/discounts/{id}', [DiscountController::class, 'findById']);
Route::apiResource('orders', OrderController::class);
Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus']);
Route::apiResource('customers', KhachHangController::class);

//quản lý tài khoản
Route::apiResource('tai_khoans',TaiKhoanController::class);
Route::apiResource('quyens',QuyenController::class);
Route::apiResource('phan_quyens',PhanQuyenController::class);

//send mail
Route::apiResource('invoices', InvoiceController::class);



Route::post('/send_email/{id}', [InvoiceController::class, 'sendEmail']);
