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

Route::get('/', [
    'as' => 'trang-chu',
    'uses' => 'PageController@getIndex',
]);

Route::get('dangki', [
    'as' => 'dangki',
    'uses' => 'PageController@getDangKi',
]);

Route::post('dangki', [
    'as' => 'dangki',
    'uses' => 'PageController@postDangKi',
]);

Route::get('dangnhap', [
    'as' => 'dangnhap',
    'uses' => 'PageController@getDangNhap',
]);

Route::post('dangnhap', [
    'as' => 'dangnhap',
    'uses' => 'PageController@postDangNhap',
]);

Route::get('dangxuat', [
    'as' => 'dangxuat',
    'uses' => 'PageController@postDangXuat',
]);

Route::get('lienhe', [
    'as' => 'lienhe',
    'uses' => 'PageController@getLienHe',
]);

Route::post('lienhe', [
    'as' => 'lienhe',
    'uses' => 'PageController@postLienHe',
]);

Route::get('/modal-booking', 'BookingController@index');
Route::post('/modal-booking', 'BookingController@store');
// Route::get('/modal-login','LoginController@index');

// admin
Route::get('admin/login', 'AdminController@getLoginAdmin');
Route::post('admin/login', 'AdminController@postLoginAdmin');
Route::get('admin/logout', 'AdminController@getLogoutAdmin');
Route::group(['prefix' => 'admin'], function () {
    //
    Route::group(['prefix' => 'product', 'middleware' => 'adminLogin'], function() {
        Route::get('admin-list-product', 'AdminController@getIndexProduct');
        Route::get('admin-add-product', 'AdminController@getProductAdd');
        Route::post('post-admin-add-product', 'AdminController@postProductAdd');
        Route::get('edit-product/{id}', 'AdminController@getProductEdit');
        Route::post('admin-edit-product/{id}', 'AdminController@postProductEdit');
        Route::post('delete-product/{id}', 'AdminController@postProductDelete');
    });

    Route::group(['prefix' => 'booking', 'middleware' => 'adminLogin'], function() {
        //
        Route::get('admin-list-booking', 'AdminController@getIndexBooking');
        Route::post('delete-booking/{id}', 'AdminController@postBookingDelete');
        Route::get('admin-add-booking', 'AdminController@getBookingAdd');
        Route::get('edit-booking/{id}', 'AdminController@getBookingEdit');
        Route::post('admin-edit-booking/{id}', 'AdminController@postBookingEdit');
        Route::post('post-admin-add-booking', 'AdminController@postBookingAdd');
    });

    Route::group(['prefix' => 'bill', 'middleware' => 'adminLogin'], function() {
        //
        Route::get('admin-list-bill','AdminController@getBill');
        Route::post('delete-bill/{id}', 'AdminController@postBillDelete');
    });

    Route::group(['prefix' => 'bill-details', 'middleware' => 'adminLogin'], function() {
        //
        Route::get('admin-list-bill-details','AdminController@getBillDetail');
        Route::post('delete-bill-details/{id}', 'AdminController@postBillDetailDelete');

    });

    Route::group(['prefix' => 'customers', 'middleware' => 'adminLogin'], function() {
        //
        Route::get('admin-list-customer','AdminController@getCustomer');
        Route::get('edit-customer/{id}', 'AdminController@getCustomerEdit');
        Route::post('admin-edit-customer/{id}', 'AdminController@postCustomerEdit');
        Route::post('delete-customer/{id}', 'AdminController@postCustomerDelete');
    });

    Route::group(['prefix' => 'contacts', 'middleware' => 'adminLogin'], function() {
        //
        Route::get('admin-list-contact','AdminController@getContact');
        Route::get('edit-contact/{id}', 'AdminController@getContactEdit');
        Route::post('admin-edit-contact/{id}', 'AdminController@postContactEdit');
        Route::post('delete-contact/{id}', 'AdminController@postContactDelete');
    });

    Route::group(['prefix' => 'slides', 'middleware' => 'adminLogin'], function() {
        //
        Route::get('admin-list-slide','AdminController@getSlide');
        Route::get('admin-add-slide', 'AdminController@getSlideAdd');
        Route::post('post-admin-add-slide', 'AdminController@postSlideAdd');
        Route::get('edit-slide/{id}', 'AdminController@getSlideEdit');
        Route::post('admin-edit-slide/{id}', 'AdminController@postSlideEdit');
        Route::post('delete-slide/{id}', 'AdminController@postSlideDelete');
    });

    Route::group(['prefix' => 'users', 'middleware' => 'adminLogin'], function() {
        //
        Route::get('admin-list-user','AdminController@getUser');
        Route::get('admin-add-user', 'AdminController@getUserAdd');
        Route::post('post-admin-add-user', 'AdminController@postUserAdd');
        Route::get('edit-user/{id}', 'AdminController@getUserEdit');
        Route::post('admin-edit-user/{id}', 'AdminController@postUserEdit');
        Route::post('delete-user/{id}', 'AdminController@postUserDelete');
    });
});


//thêm sản phẩm vào giỏ hàng
Route::get('/Add-Cart/{id}', 'PageController@AddCart');

// xóa sản phẩm khỏi giỏ hàng
Route::get('/Delete-Item-Cart/{id}', 'PageController@DeleteItemCart');

// hiển thị giỏ hàng trong view cart
Route::get('/List-Carts', 'PageController@ViewListCart');

// xóa sản phẩm trong view cart
Route::get('/Delete-Item-List-Cart/{id}', 'PageController@DeleteListItemCart');

// lưu 1 sản phẩm trong view cart
Route::get('/Save-Item-List-Cart/{id}/{quanty}', 'PageController@SaveListItemCart');

// lưu toàn bộ sản phẩm trong view cart
Route::post('/Save-All', 'PageController@SaveAllListItemCart'); // dùng post vì nhiều dữ liệu

// xoa toàn bộ sản phẩm trong view cart
Route::post('/Delete-All', 'PageController@DeleteAllListItemCart'); // dùng post vì nhiều dữ liệu

Route::get('/Check-Out-Carts', [
    'as' => 'checkout',
    'uses' => 'PageController@ViewCheckOutCart']);
Route::post('/Check-Out-Carts', [
    'as' => 'checkout',
    'uses' => 'PageController@postCheckout',
]);

// Route::get('thu',function(){
//     return view('admin.product.add');
// });
