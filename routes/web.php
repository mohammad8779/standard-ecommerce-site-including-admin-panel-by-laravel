<?php

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

//Frontend routes............................
Route::get('/','HomeController@index');

//category wise products
Route::get('/product_by_category/{category_id}','HomeController@Show_product_by_category');

//manufacture wise products
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@Show_product_by_manufacture');
//manufacture wise products
Route::get('/view_product/{product_id}','HomeController@product_details');

//products quantity
Route::post('/add-to-cart','CartController@add_to_cart');
//add product in cart
Route::get('/show-cart','CartController@show_cart');
//delete cart
Route::get('/delete-cart-product/{rowId}','CartController@delete_cart_product');

//update cart
Route::post('/update-cart-product','CartController@update_cart_product');

//customer related
Route::get('/check-login','CheckoutController@check_login');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::post('/customer-login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-info','CheckoutController@save_shipping_info');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');






//Backend routes............................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
//this below route is not need
//Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');

//order related for admin panel
Route::get('/manage-order','SuperAdminController@manage_order');
Route::get('/view-order/{order_id}','SuperAdminController@view_order');


//category route
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@allcategory');
Route::post('/save-category','CategoryController@savecategory');
Route::get('/unactive_category/{category_id}','CategoryController@unactivecategory');
Route::get('/active_category/{category_id}','CategoryController@activecategory');
Route::get('/edit-category/{category_id}','CategoryController@editcategory');
Route::post('/update-category/{category_id}','CategoryController@updatecategory');
Route::get('/delete-category/{category_id}','CategoryController@deletecategory');

//manufacture route
Route::get('/add-manufacture','ManufactureController@index');
Route::get('/all-manufacture','ManufactureController@allmanufacture');
Route::post('/save-manufacture','ManufactureController@savemanufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactivemanufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@activemanufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@editmanufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@updatemanufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@deletemanufacture');


//product route
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@saveproduct');
Route::get('/all-product','ProductController@allproduct');
Route::get('/unactive-product/{product_id}','ProductController@unactivproduct');
Route::get('/active-product/{product_id}','ProductController@activeproduct');
Route::get('/edit-product/{product_id}','ProductController@editproduct');
Route::get('/delete-product/{product_id}','ProductController@deleteproduct');
Route::post('/update-product/{product_id}','ProductController@updateproduct');

//slider route
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@saveslider');
Route::get('/all-slider','SliderController@allslider');
Route::get('/unactive-slider/{slider_id}','SliderController@unactiveslider');
Route::get('/active-slider/{slider_id}','SliderController@activeslider');
Route::get('/delete-slider/{slider_id}','SliderController@deleteslider');