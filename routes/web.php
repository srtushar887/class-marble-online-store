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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

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



    });
});
