<?php

use App\Http\Livewire\HomeComponent;

use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;

use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReviewComponent;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;

use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;

use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;

use App\Http\Livewire\Admin\AdminPersonalizacionCafeComponent;
use App\Http\Livewire\Admin\AdminAddPersonalizacionCafeComponent;
use App\Http\Livewire\Admin\AdminEditPersonalizacionCafeComponent;

use App\Http\Livewire\Admin\AdminPresentacionProducto;
use App\Http\Livewire\Admin\AdminAddPresentacionProducto;
use App\Http\Livewire\Admin\AdminEditPresentacionProducto;

use App\Http\Livewire\Admin\AdminImpuestoComponent;
use App\Http\Livewire\Admin\AdminAddImpuestoComponent;
use App\Http\Livewire\Admin\AdminEditImpuestoComponent;

use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;

use App\Http\Livewire\Admin\AdminDetailsProductComponent;

use App\Http\Livewire\Admin\AdminGestionarUsuarioComponent;

use App\Http\Livewire\BarCodeController;

use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// For User or Customer
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
});


// For Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    Route::get('/admin/personalizacioncafe', AdminPersonalizacionCafeComponent::class)->name('admin.personalizacioncafe');
    Route::get('/admin/personalizacioncafe/add', AdminAddPersonalizacionCafeComponent::class)->name('admin.addpersonalizacioncafe');
    Route::get('/admin/personalizacioncafe/edit/{cafepersonalizacion_slug}', AdminEditPersonalizacionCafeComponent::class)->name('admin.editpersonalizacioncafe');

    Route::get('/admin/presentacionproducto', AdminPresentacionProducto::class)->name('admin.presentacionproducto');
    Route::get('/admin/presentacionproducto/add', AdminAddPresentacionProducto::class)->name('admin.addpresentacionproducto');
    Route::get('/admin/presentacionproducto/edit/{presentacionproducto_slug}', AdminEditPresentacionProducto::class)->name('admin.editpresentacionproducto');

    Route::get('/admin/impuesto', AdminImpuestoComponent::class)->name('admin.impuesto');
    Route::get('/admin/impuesto/add', AdminAddImpuestoComponent::class)->name('admin.addimpuesto');
    Route::get('/admin/impuesto/edit/{impuesto_slug}', AdminEditImpuestoComponent::class)->name('admin.editimpuesto');

    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupons/add', AdminAddCouponsComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupons/edit/{coupon_id}', AdminEditCouponsComponent::class)->name('admin.editcoupon');

    Route::get('/admin/product/details/{product_details_slug}', AdminDetailsProductComponent::class)->name('admin.productdetails');

    Route::get('/admin/gestion_usuarios', AdminGestionarUsuarioComponent::class)->name('admin.usuariogestion');
});

Route::get('/barcode', BarCodeController::class)->name('barcode');

Auth::routes();

// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
// -----------------------------forget password ------------------------------
Route::get('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@getEmail')->name('forget-password');
Route::post('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@postEmail')->name('forget-password');

Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');

//No es de Google
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


