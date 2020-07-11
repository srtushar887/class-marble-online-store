<?php

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

Route::get('/','FrontendController@index')->name('front');
Route::get('/about-us','FrontendController@about_us')->name('about.us');
Route::get('/terms-condition','FrontendController@privacy_policy')->name('terms.condition');
Route::get('/faq','FrontendController@faq')->name('faq');
//Route::get('/all-products','FrontendController@all_products')->name('all.products');
//Route::get('/category-products/{id}','FrontendController@category_products')->name('category.product');
//Route::get('/product-details/{id}','FrontendController@product_details')->name('product.details');
//Route::get('/add-card-single/{id}','FrontendController@add_cart_single')->name('add.cart.single');
//Route::post('/add-card-multiple','FrontendController@add_cart_multiple')->name('add.cart.multiple');
//Route::get('/remove-card-single/{id}','FrontendController@remove_cart_single')->name('remove.item.cart');
//Route::get('/view-cart','FrontendController@view_cart')->name('view.cart');
//Route::get('/cart-update','FrontendController@cart_update')->name('cart.update.checkout');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact-send','FrontendController@contact_send')->name('contact.main.send');
Route::post('/newslatter-send','FrontendController@newslater_send')->name('newslater.send');
//Route::get('/category-product/{id}','FrontendController@category_product')->name('category.prodyuct');


//custom register
Route::post('/custom-register','CustomLoginController@register')->name('custom.register');

Auth::routes();





Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //general settings
        Route::get('/general-settings', 'Admin\AdminController@general_settings')->name('admin.general.settings');
        Route::post('/general-settings-save', 'Admin\AdminController@general_settings_save')->name('admin.generalsettings.save');

        //category
        Route::get('/category', 'Admin\AdminCategoryController@category')->name('admin.category');
        Route::post('/category-save', 'Admin\AdminCategoryController@category_save')->name('admin.category.create');
        Route::post('/category-update', 'Admin\AdminCategoryController@category_update')->name('admin.category.update');
        Route::post('/category-delete', 'Admin\AdminCategoryController@category_delete')->name('admin.category.delete');


        //tag
        Route::get('/tag', 'Admin\AdminTagController@tag')->name('admin.tag');
        Route::post('/tag-save', 'Admin\AdminTagController@tag_save')->name('admin.tag.create');
        Route::post('/tag-update', 'Admin\AdminTagController@tag_update')->name('admin.tag.update');
        Route::post('/tag-delete', 'Admin\AdminTagController@tag_delete')->name('admin.tag.delete');


        //product
        Route::get('/product', 'Admin\AdminProductController@product')->name('admin.product');
        Route::get('/product-create', 'Admin\AdminProductController@product_create')->name('admin.create.product');
        Route::post('/product-save', 'Admin\AdminProductController@product_save')->name('admin.product.save');
        Route::get('/product-edit/{id}', 'Admin\AdminProductController@product_edit')->name('admin.edit.product');
        Route::post('/product-update', 'Admin\AdminProductController@product_update')->name('admin.product.update');
        Route::post('/product-delete', 'Admin\AdminProductController@product_delete')->name('admin.product.delete');

        //order
        Route::get('/user-order', 'Admin\AdminOrderController@user_order')->name('admin.order');
        Route::get('/view-order/{id}', 'Admin\AdminOrderController@view_order')->name('admin.view.order');
        Route::post('/order-update', 'Admin\AdminOrderController@order_update')->name('admin.order.update');
        Route::get('/order-print/{id}', 'Admin\AdminOrderController@order_print')->name('admin.order.print');

        //users
        Route::get('/users', 'Admin\AdminUserController@users')->name('admin.users');
        Route::post('/users-update', 'Admin\AdminUserController@users_update')->name('admin.user.update');
        Route::get('/users-export', 'Admin\AdminUserController@user_export')->name('admin.user.export');


        //frontend control
        Route::get('/home-header', 'Admin\AdminFrontendController@home_slider')->name('admin.slider');
        Route::post('/home-header-save', 'Admin\AdminFrontendController@home_slider_save')->name('admin.home.header.save');

        //partner
        Route::get('/home-partner', 'Admin\AdminFrontendController@home_partner')->name('admin.home.partner');
        Route::post('/home-partner-create', 'Admin\AdminFrontendController@home_partner_create')->name('admin.partner.create');
        Route::post('/home-partner-update', 'Admin\AdminFrontendController@home_partner_update')->name('admin.partner.update');
        Route::post('/home-partner-delete', 'Admin\AdminFrontendController@home_partner_delete')->name('admin.partner.delete');

        //newslatter email
        Route::get('/newslatter-emails', 'Admin\AdminFrontendController@newslatter_emails')->name('admin.newslatter');



    });
});


Route::group(['middleware' => ['auth','uStatus','uAccDis']], function() {
    Route::group(['prefix' => 'home'], function ()
    {
        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/my-profile', 'UserController@profile')->name('my.profile');
        Route::get('/my-profile-save', 'UserController@profile_save')->name('user.profile.save');

        //checkout
        Route::get('/checkout', 'UserController@checkout')->name('checkout');
        Route::post('/checkout-save', 'UserController@checkout_save')->name('user.checkout.save');



        Route::get('/all-products','UserFrontendController@all_products')->name('all.products');
        Route::get('/category-products/{id}','UserFrontendController@category_products')->name('category.product');
        Route::get('/product-details/{id}','UserFrontendController@product_details')->name('product.details');
        Route::get('/add-card-single/{id}','UserFrontendController@add_cart_single')->name('add.cart.single');
        Route::post('/add-card-multiple','UserFrontendController@add_cart_multiple')->name('add.cart.multiple');
        Route::get('/remove-card-single/{id}','UserFrontendController@remove_cart_single')->name('remove.item.cart');
        Route::get('/view-cart','UserFrontendController@view_cart')->name('view.cart');
        Route::get('/cart-update','UserFrontendController@cart_update')->name('cart.update.checkout');
        Route::get('/category-product/{id}','UserFrontendController@category_product')->name('category.prodyuct');


        //frontend filter
        Route::post('/get-all-product','UserFrontendController@load_more')->name('load_more');
        Route::post('/get-all-product-category-product','UserFrontendController@load_more_category')->name('load_more.category');

        //get product bt caregory
        Route::post('/get-product-by-category','UserFrontendController@get_product_by_category')->name('get.product.by.category');
        Route::post('/get-search-load-more-category','UserFrontendController@category_searcg_load_more')->name('category.search.loadmore.ajax');

        //get product by tag
        Route::post('/get-product-by-tag','UserFrontendController@get_product_by_tag')->name('get.product.by.tag');
        Route::post('/get-product-by-tag-load-more','UserFrontendController@get_product_by_tag_load_more')->name('tag.search.loadmore.ajax');






    });
});
