<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ProductItemController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PurchaseOrderItemController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [LoginController::class, 'loginFunction']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [LoginController::class, 'logOutFunction']);
    Route::get('/profile', [LoginController::class, 'profileFunction']);
    Route::resource('customers', CustomerController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('products', ProductController::class);
    Route::resource('promos', PromoController::class);
    Route::resource('product_items', ProductItemController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('purchase-orders', PurchaseOrderController::class);
    Route::resource('sessions', SessionController::class);
    Route::get('login/purchase-orders/{userId}', [LoginController::class, 'purchaseOrder']);


});




Route::get('purchase-orders', [PurchaseOrderController::class, 'index']);
Route::get('purchase-orders/customer/{customerId}', [PurchaseOrderController::class, 'getByCustomerId']);
Route::get('purchase-orders/product/{productId}', [PurchaseOrderController::class, 'getByProductId']);
Route::get('/purchase-orders/{id}', [PurchaseOrderController::class, 'show']);
Route::get('purchase-orders/promos/{promotId}', [PurchaseOrderController::class, 'getByProductId']);
Route::post('/purchase-order/session/{sessionsId}', [PurchaseOrderController::class, 'sessions']);
Route::get('sessions/employees/{employeeId}', [SessionController::class, 'getByEmployeeId']);
Route::get('/purchase-orders/branches/{branchId}', [PurchaseOrderController::class, 'getByBranchId']);
Route::get('/purchase-order/session', [PurchaseOrderController::class, 'getByPurchaseOrderIdFromSession']);



Route::get('/sessions/{id}', [SessionController::class, 'getSessionById']);
Route::get('/purchase-order-items', [PurchaseOrderItemController::class, 'index']);
Route::get('product-items/purchase-order-items/{productItemId}', [ProductItemController::class, 'purchaseOrderItems']);
Route::get('customers/purchase-order-items/{customerId}', [CustomerController::class, 'purchaseOrderItems']);



Route::get('/getMenuData', [PurchaseOrderController::class, 'showMenuUtama']);
Route::get('/branch', [BranchController::class, 'showBranches']);
Route::get('/customer', [CustomerController::class, 'showCustomers']);
Route::get('/employee', [EmployeeController::class, 'showEmployees']);
Route::get('/product', [ProductController::class, 'showProducts']);
Route::get('/promo', [PromoController::class, 'showPromos']);
Route::get('/purchase-order-item', [PurchaseOrderItemController::class, 'transformData']);
Route::get('/product-item', [ProductItemController::class, 'showProductItems']);