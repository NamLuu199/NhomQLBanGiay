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
// Trang chủ
Route::get('/', 'ShopController@index')->name('shop.home');
// Liên Hệ

// Chi tiet sản phẩn
Route::get('/chi-tiet-san-pham/{slug}_{id}', 'ShopController@getProduct')->name('shop.product');

// Tìm kiếm
Route::get('/tim-kiem', 'ShopController@search')->name('shop.search');

// Thêm sản phẩm vào giỏ hàng hompage
Route::get('/dat-hang/them-sp-vao-gio-hang/{id}', 'CartController@addToCart')->name('shop.cart.add-to-cart');

// Xóa SP khỏi giỏ hàng
Route::get('/dat-hang/xoa-sp-gio-hang/{id}', 'CartController@removeToCart')->name('shop.cart.remove-to-cart');

//Them san pham trong gio hang
Route::get('/dat-hang/xem-san-pham-trong-gio-hang/', 'CartController@ViewListCart')->name('shop.cart.add-view-cart');


// Cập nhật giỏ hàng
Route::get('/dat-hang/cap-nhat-gio-hang/{id}/{quanty}', 'CartController@SaveListItemCart')->name('shop.cart.update-to-cart');

// Áp dụng giảm giá
Route::get('/dat-hang/ma-giam-gia', 'CartController@checkCoupon')->name('shop.cart.check-coupon');


// Hủy đơn hàng
Route::get('/dat-hang/huy-don-hang', 'CartController@destroy')->name('shop.cart.destroy');

// Đặt hàng
Route::get('/dat-hang', 'CartController@index')->name('shop.cart');
// Thanh toán
Route::get('/thanh-toan', 'CartController@checkout')->name('shop.cart.checkout');

Route::post('/thanh-toan', 'CartController@postCheckout')->name('shop.cart.checkout');
// // Thanh toán
Route::get('/lien-he', 'ContactController@create')->name('shop.contact');

Route::post('/lien-he', 'ContactController@store')->name('shop.contact.store');
// Route::resource('contact', 'ContactController');
//comments
Route::post('/comment/{blog_id}','CommentController@createBlog')->name('comments.create');
Route::post('/comments/{product_id}','CommentController@store')->name('comments.store');

/////////////////////////////////////////
// Đăng nhập
Route::get('/admin/login', 'AdminController@login')->name('admin.login');

// Đăng xuất
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
//tra cứu
Route::get('/tk', 'ShopController@sorder')->name('shop.sorder');
Route::get('/tra-cuu', 'ShopController@viewsearchorder')->name('shop.viewsearchorder');
Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');
Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => ['CheckLogin']], function() {

	Route::get('/', 'AdminController@index')->name('dashboard');

    // Router cho category
	Route::resource('category', 'CategoryController');

    // Router cho Vendor
	   Route::resource('vendor','VendorController');


   	// Router cho Banner
	   Route::resource('banner','BannerController');

   	// Router cho Brand
	   Route::resource('brand','BrandController');
	   Route::get('searchBrand','BrandController@searchBrand');

   	// Router cho Product
	   Route::resource('product','ProductController');
	   Route::get('searchProduct','ProductController@searchProduct');

   	// Router cho User
	   Route::resource('user','UserController');

	// Router cho Image Product
	   Route::resource('imageUpload','ImageUploadController');

   	// Router cho Blog
   		Route::resource('blog','BlogController');
   		Route::get('searchBlog','BlogController@searchBlog');

   	// Router cho Order
   		Route::resource('order','OrderController');
   		Route::get('searchOrder','OrderController@searchOrder');

   	// Router cho Contact
   		Route::get('contact','ContactController@index')->name('contact.index');
   		Route::get('contact/{contact}/edit','ContactController@edit')->name('contact.edit');
   		Route::put('contact/{contact}','ContactController@update')->name('contact.update');
   		Route::patch('contact/{contact}','ContactController@update')->name('contact.update');
   		Route::get('searchContact','ContactController@searchContact');

   	// Router cho Coupon
   		Route::resource('coupon', 'CouponController');
   		Route::get('searchCoupon','CouponController@searchCoupon');

   	 // Cau Hinh Website
        Route::resource('setting', 'SettingController');
   		Route::resource('page', 'PageController');
   		Route::resource('AboutUs','AboutUsController');
   		Route::get('listicon','ListIconController@index')->name('listicon');
});
Route::get('forgot-password','AdminController@forgot')->name('forgot');
Route::post('forgot-password','AdminController@getForgotPassword')->name('getForgot');
Route::get('resetPassword/{token}','AdminController@resetPassword')->name('resetPassword');
Route::post('resetPassword','AdminController@newPass')->name('newPass');
//
Route::get('/danh-muc/{slug}', 'ShopController@getProductsByCategory')->name('shop.category');
Route::get('/blogs-detalis/{slug}_{id}.html', 'ShopController@ViewBlog')->name('shop.blog');
Route::get('/blogs-detalis', 'ShopController@BlogDetails')->name('shop.blog-detalis');
Route::get('/danh-muc/{slug}/filter','ShopController@filter')->name('shop.filter');
Route::get('/{slug}/{id}', 'ShopController@getpage')->name('shop.page');
Route::get('/{slug}', 'GeneralController@notfound')->name('shop.notfound');
