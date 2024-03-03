<?php

use App\Http\Controllers\Admim\AdminController;
use App\Http\Controllers\Admim\AdminCouponController;
use App\Http\Controllers\Admim\AdminFeeShipController;
use App\Http\Controllers\Admim\AdminOrderController;
use App\Http\Controllers\Admim\PDFController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Pay\PayController;
use App\Http\Controllers\User\DeliveryAddressController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function () {
    Route::get('/', [AuthController::class, 'showFormLogin']);
    Route::post('/login', [AuthController::class, 'loginAdmin']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/show-dash-board', [AdminController::class, 'showDashBoard']);
    Route::get('/register', [AuthController::class, 'showFormRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    //products
    Route::get('/add-product', [AdminController::class, 'showFormAddProduct']);
    Route::post('/add-product', [AdminController::class, 'addProduct']);
    Route::get('/update-product/{masp}', [AdminController::class, 'showFormUpdateProduct'])->name('update-product');
    Route::post('/update-product/{masp}', [AdminController::class, 'updateProduct']);
    Route::delete('/delete-product/{masp}', [AdminController::class, 'deleteProduct'])->name('delete-product');
    Route::delete('/delete-product-ajax/{masp}', [AuthController::class, 'deleteProductAjax']);
    Route::delete('/delete-multiple-products', [AdminController::class, 'deleteMultipleProducts'])->name('delete-multiple-products');
    Route::post('/search-keyword', [AdminController::class, 'searchKeyword']);
    Route::get('/export-products-excel', [AdminController::class, 'exportProductsExcel']);
    Route::post('/import-products-excel', [AdminController::class, 'importProductsExcel']);
    //order
    Route::get('/order', [AdminOrderController::class, 'showFormOrder']);
    Route::post('/order/{madonhang}', [AdminOrderController::class, 'updateOrder']);
    Route::get('/orderDetail/{madonhang}', [AdminOrderController::class, 'showFormOrderDetail']);
    Route::get('/export-order-pdf/{madonhang}', [PDFController::class, 'exportOrder']);
    //coupon
    Route::get('/coupon', [AdminCouponController::class, 'showCoupon']);
    Route::get('/add-coupon', [AdminCouponController::class, 'showFormAddCoupon']);
    Route::post('/add-coupon', [AdminCouponController::class, 'addCoupon']);
    Route::get('/update-coupon/{giamgia_id}', [AdminCouponController::class, 'showFormUpdateCoupon']);
    Route::post('/update-coupon', [AdminCouponController::class, 'updateCoupon']);
    Route::post('/delete-coupon-ajax', [AdminCouponController::class, 'deleteCouponAjax']);
    //fee-ship
    Route::get('/fee-ship', [AdminFeeShipController::class, 'showFormFeeShip']);
    Route::get('/add-feeship', [AdminFeeShipController::class, 'showFormAddFeeShip']);
    Route::get('/get-districts/{provinceId}', [AdminFeeShipController::class, 'getDistric']);
    Route::get('/get-wards/{districtId}', [AdminFeeShipController::class, 'getWards']);
    Route::post('/update-feeship/{feeshipId}', [AdminFeeShipController::class, 'updateFeeship']);
});

Route::prefix('user')->group(function () {
    Route::get('/login', [AuthController::class, 'showFormLoginUser']);
    Route::post('/login', [AuthController::class, 'loginUser']);
    Route::get('/register', [AuthController::class, 'showFormRegisterUser']);
    Route::post('/register', [AuthController::class, 'registerUser']);
    Route::get('/logout', [AuthController::class, 'logoutUser']);
    Route::get('/forgot-password', [AuthController::class, 'showFormForgotPassword']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::get('/reset-password/{token}', [AuthController::class, 'showFormResetPassword']);
    Route::post('/reset-password/{token}', [AuthController::class, 'resetPassword']);
    //login fb
    Route::get('login/facebook', [FacebookController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('login/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
    //login google
    Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
    //
    Route::get('/', [UserController::class, 'showFormIndex']);
    Route::get('/product-type/{maloai}', [UserController::class, 'showFormProductType'])->name('product-type');
    Route::get('/product-detail/{masp}', [UserController::class, 'showFormProductDetail'])->name('product-detail');
    //cart
    Route::get('/cart', [CartController::class, 'showFormCart']);
    Route::post('/add-cart', [CartController::class, 'addCart']);
    Route::get('/delete-cart/{mactgiohang}', [CartController::class, 'deleteCart']);
    //cart ajax
    Route::post('/add-cart-ajax', [CartController::class, 'addCartAjax']);
    Route::post('/update-cart-ajax', [CartController::class, 'updateCartAjax']);
    Route::post('/delete-cart-ajax', [CartController::class, 'deleteCartAjax']);
    //coupon
    Route::post('/check-coupon', [CartController::class, 'checkCoupon']);
    //purchase
    Route::get('/purchase', [PayController::class, 'showFormPurchase']);
    Route::post('/purchasee', [PayController::class, 'purchase']);
    Route::get('/waitingPurchase', [PayController::class, 'showFormWaitingPurchase']);
    //deliveryAddress
    Route::get('/delivery-address', [DeliveryAddressController::class, 'showFormDeliveryAddress']);
    Route::get('/add-delivery-address',[DeliveryAddressController::class, 'showFormAddDeliveryAddress']);
    Route::post('/add-delivery-address',[DeliveryAddressController::class, 'addDeliveryAddress']);
    Route::get('/change-delivery-address/{mattnh}', [DeliveryAddressController::class, 'changeDeliveryAddress']);
    Route::get('/update-delivery-address/{mattnh}', [DeliveryAddressController::class, 'showFormUpdateDeliveryAddress']);
    Route::post('/update-delivery-address', [DeliveryAddressController::class, 'updateDeliveryAddress']);
    Route::get('/delete-delivery-address/{mattnh}', [DeliveryAddressController::class, 'deleteDeliveryAddress']);
    Route::get('/get-districts/{provinceId}', [DeliveryAddressController::class, 'getDistricts']);
    Route::get('/get-wards/{districtId}', [DeliveryAddressController::class, 'getWards']);

    //ordoer
    Route::get('/order', [OrderController::class, 'showFormOrder']);
});
