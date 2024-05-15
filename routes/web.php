<?php

use App\Http\Controllers\ClientAuth;
//CLIENT
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\ProductsController;
//ADMIN
use App\Http\Controllers\ClientOrderController;
use App\Http\Controllers\Admin\CodeController as adminCodeController;
use App\Http\Controllers\Admin\UserController as adminUserController;
use App\Http\Controllers\Admin\OrderController as adminOrderController;
use App\Http\Controllers\DashboardController as clientDashboradController;
use App\Http\Controllers\Admin\ProductController as adminProductController;
use App\Http\Controllers\Admin\VoucherController as adminVoucherController;
use App\Http\Controllers\Admin\CategoryController as adminCategoryController;
use App\Http\Controllers\Admin\DashboardController as adminDashboardController;
use App\Http\Controllers\Admin\ProductColorController as adminProductColorController;
use App\Http\Controllers\Admin\DeliveryController as adminDeliveryController;






//landingpage route
Route::get('/', function () {
    return view('welcome');
});

//client login/register
Route::get('client/login', [ClientAuth::class, 'loginIndex'])->name('login.view');
Route::post('client/login-auth', [ClientAuth::class,'loginAuth'])->name('login.auth');
Route::get('client/register', [ClientAuth::class, 'registerIndex'])->name('register.view');
Route::post('client/register-post', [clientAuth::class,'registerPost'])->name('register.post');
Route::get('client/logout',[clientAuth::class, 'logout'])->name('client.logout');

//client routes
Route::get('client/dashboard/{username}',[clientDashboradController::class, 'index'])->name('dashboard.view');
Route::get('dashboard/{username}/products/{categoryId}', [clientDashboradController::class, 'showProductsByCategory'])
    ->name('dashboard.showProducts');
Route::get('admin/{username}/dashboard/search-dashboard', [clientDashboradController::class, 'dashboardSearch'])->name('dashboard.search');
Route::get('client/{username}/products/{productId}', [ProductsController::class, 'productsIndex'])->name('products.view');
//client order
Route::post('client/order/{username}', [CartController::class, 'clientOrder'])->name('clientOrder.add');
//client carts
Route::get('client/cart/{username}',[CartController::class, 'index'])->name('cart.view');
Route::post('client/check-out/{username}',[CartController::class, 'checkOutPost'])->name('checkout.post');
Route::delete('/checkout/{username}/delete/{check_out_id}', [CartController::class, 'deleteCheckout'])->name('checkout.delete');

Route::get('client/{username}/check-out/form', [CartController::class, 'checkOutFormIndex'])->name('checkoutform.view');

Route::get('client/{username}/order', [ClientOrderController::class, 'ClientOrder'])->name('clientorder.view');
// Route::get('client/code',[CartController::class, 'codeIndex'])->name('code.view');
// Route::get('client/voucher', [CartController::class, 'voucherIndex'])->name('voucher.view');


//admin login
Route::get('admin/login',[AdminAuth::class,'loginIndex'])->name('adminlogin.view');
Route::post('admin/login-auth', [AdminAuth::class,'adminLoginAuth'])->name('adminlogin.auth');
Route::get('admin/logout',[AdminAuth::class,'logout'])->name('admin.logout');

//admin routes
Route::get('admin/dashboard',[adminDashboardController::class, 'index'])->name('adminDashboard.view');

//orderlist//
Route::get('admin/order', [adminOrderController::class, 'index'])->name('adminOrder.view');
Route::get('admin/orderlist/{clientId}/{orderRanNum}', [AdminOrderController::class,'orderListIndex'])->name('orderlist.view');

//admin category list//
Route::get('admin/category', [adminCategoryController::class, 'index'])->name('adminCategory.view');
Route::get('admin/add-category-form',[adminCategoryController::class,'addCategoryIndex'])->name('adminCategoryForm.view');
Route::post('admin/add-category-form-post',[adminCategoryController::class,'CategoryStore'])->name('adminCategoryForm.post');
Route::get('admin/edit-category-form/{id}', [adminCategoryController::class, 'editCategoryIndex'])->name('editCategoryForm.view');
Route::post('admin/edit-post-category-form/{id}', [adminCategoryController::class, 'editCategoryPost'])->name('editCategoryForm.post');
Route::get('admin/category/search-category', [adminCategoryController::class, 'categorySearch'])->name('category.search');
Route::delete('admin/category-delete/{id}', [adminCategoryController::class, 'categoryDelete'])->name('category.delete');

//admin product list//
Route::get('admin/products', [adminProductController::class, 'index'])->name('adminProduct.view');
Route::get('admin/add-products-form', [adminProductController::class, 'addProductIndex'])->name('adminProductForm.view');
Route::post('admin/add-Product-form-post', [adminProductController::class, 'ProductStore'])->name('adminProductForm.post');
Route::get('admin/edit-product-form/{id}', [adminProductController::class, 'editProduct'])->name('editProductForm.view');
Route::post('admin/edit-post-product-form/{id}', [adminProductController::class, 'editProductPost'])->name('editProductForm.post');
Route::delete('admin.product-delete/{id}', [adminProductController::class, 'productDelete'])->name('product.delete');
Route::get('admin/product/search-product', [adminProductController::class, 'productSearch'])->name('product.search');

// admin color lost//
Route::get('admin/color',[adminProductColorController::class, 'index'])->name('adminProductColor.view');
Route::get('admin/add-color-form',[adminProductColorController::class, 'addColorIndex'])->name('adminColorForm.view');
Route::post('admin/add-product-form-post', [adminProductColorController::class, 'ColorStore'])->name('adminColorForm.post');
Route::get('admin/edit-color-form/{id}',[adminProductColorController::class, 'editColor'])->name('editColorForm.view');
Route::post('admin/edit-product-form-post/{id}', [adminProductColorController::class, 'editColorPost'])->name('editColorForm.post');
Route::delete('admin.color-delete/{id}', [adminProductColorController::class, 'colorDelete'])->name('color.delete');
Route::get('admin/color/search-color', [adminProductColorController::class, 'colorSearch'])->name('color.search');

// admin client user list//
Route::get('admin/user', [adminUserController::class, 'index'])->name('adminUser.view');
Route::get('admin/user/search-user', [adminUserController::class, 'userSearch'])->name('user.search');

//admin delivery//
Route::get('admin/delivery',[adminDeliveryController::class, 'index'])->name('adminDelivery.view');