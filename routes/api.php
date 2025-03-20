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
