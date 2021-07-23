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

Route::group(['namespace' => 'User'], function () {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'Home_Controller@home'
    ]);
    // tim kiem
    Route::get('search', [
        'as' => 'search',
        'uses' => 'Home_Controller@search'
    ]);
    // đăng nhập đăng ký đăng xuất
    Route::get('login', [
        'as' => 'login',
        'uses' => 'Login_Register_Controller@getlogin'
    ]);

    Route::get('register', [
        'as' => 'register',
        'uses' => 'Login_Register_Controller@getregister'
    ]);

    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'Login_Register_Controller@getlogout'
    ]);

    Route::post('res', [
        'as' => 'res',
        'uses' => 'Login_Register_Controller@postregister'
    ]);

    Route::post('log', [
        'as' => 'log',
        'uses' => 'Login_Register_Controller@postlogin'
    ]);

    // trang cá nhân
    Route::get('profile/{id}', [
        'as' => 'profile',
        'uses' => 'Home_Controller@profile'
    ]);

    Route::post('profiles', [
        'as' => 'profiles',
        'uses' => 'Home_Controller@profiles'
    ]);
});

// san pham theo danh muc
Route::group(['namespace' => 'User'], function () {

    // sản phẩm theo danh mục
    Route::get('danh-muc/{id}', [
        'as' => 'category.index',
        'uses' => 'Category_Product_Controller@index'
    ]);

    // lọc sản phẩm
    Route::get('loc-san-pham', [
        'as' => 'filter',
        'uses' => 'Category_Product_Controller@filter'
    ]);

    // sap  xep 
    Route::get('sap-xep', [
        'as' => 'category.sort',
        'uses' => 'Category_Product_Controller@sort'
    ]);

    //sap xêp post
    Route::post('paginate', [
        'as' => 'category.paginate',
        'uses' => 'Category_Product_Controller@paginate'
    ]);

    //tim kiem trực tuyến san pham theo danh muc
    Route::get('tim-kiem', [
        'as' => 'category.search',
        'uses' => 'Category_Product_Controller@search'
    ]);
});

// chi  tiet san pham
Route::group(['namespace' => 'User'], function () {

    //san phẩm chi tiết
    Route::get('danh-muc/{category}/{id}', [
        'as' => 'product.index',
        'uses' => 'Product_Details_Controller@index'
    ]);

    //đánh giá san phẩm
    Route::get('danh-gia', [
        'as' => 'product.rate',
        'uses' => 'Product_Details_Controller@rate'
    ]);

    // binh luận
    Route::get('binh-luan', [
        'as' => 'product.comment',
        'uses' => 'Product_Details_Controller@comment'
    ]);


    // gio hang
    Route::get('gio-hang', [
        'as' => 'cart',
        'uses' => 'Cart_Controller@index'
    ]);

    //them vao gio hang
    Route::get('add-to-cart/{id}', [
        'as' => 'cart.add',
        'uses' => 'Cart_Controller@create'
    ]);

    //cap nhat gio hang
    Route::get('update-cart', [
        'as' => 'cart.update',
        'uses' => 'Cart_Controller@update'
    ]);

    // xoa gio hang
    Route::get('del-cart', [
        'as' => 'cart.delete',
        'uses' => 'Cart_Controller@delete'
    ]);


    //dat hang gio hang
    Route::post('dat-hang', [
        'as' => 'order',
        'uses' => 'Cart_Controller@order'
    ]);

    //trang chủ gio hang
    Route::get('continue', [
        'as' => 'continue',
        'uses' => 'Cart_Controller@continue'
    ]);
});

////////////////////////////////////////////////////////

Route::middleware(['admin'])->group(function () {

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('home', [
            'as' => 'ad.home',
            'uses' => 'Home_Controller@home'
        ]);
        Route::get('change-profile', [
            'as' => 'change_profile',
            'uses' => 'Home_Controller@change_profile'
        ]);
        Route::post('add-admin', [
            'as' => 'add_admin',
            'uses' => 'Home_Controller@add_admin'
        ]);

        Route::group(['prefix' => 'category'], function () {
            Route::get('create', [
                'as' => 'create_category',
                'uses' => 'Category_Controller@create_category'
            ]);

            Route::post('create', [
                'as' => 'post_create_category',
                'uses' => 'Category_Controller@post_create_category'
            ]);

            Route::get('list', [
                'as' => 'list_category',
                'uses' => 'Category_Controller@list_category'
            ]);

            Route::get('sort_category', [
                'as' => 'sort_category',
                'uses' => 'Category_Controller@sort_category'
            ]);

            Route::get('live_search_category', [
                'as' => 'live_search_category',
                'uses' => 'Category_Controller@live_search_category'
            ]);

            Route::get('show_hide/{id}', [
                'as' => 'show_hide_category',
                'uses' => 'Category_Controller@show_hide_category'
            ]);

            Route::get('update/{id}', [
                'as' => 'update_category',
                'uses' => 'Category_Controller@update_category'
            ]);

            Route::post('updates/{id}', [
                'as' => 'post_update_category',
                'uses' => 'Category_Controller@post_update_category'
            ]);

            Route::get('delete/{id}', [
                'as' => 'delete_category',
                'uses' => 'Category_Controller@delete_category'
            ]);
        });

        Route::group(['prefix' => 'trademark'], function () {

            Route::get('create', [
                'as' => 'create_trademark',
                'uses' => 'Trademark_Controller@create_trademark'
            ]);

            Route::post('create', [
                'as' => 'post_create_trademark',
                'uses' => 'Trademark_Controller@post_create_trademark'
            ]);

            Route::get('list', [
                'as' => 'list_trademark',
                'uses' => 'Trademark_Controller@list_trademark'
            ]);

            Route::get('sort_trademark', [
                'as' => 'sort_trademark',
                'uses' => 'Trademark_Controller@sort_trademark'
            ]);

            Route::get('live_search_trademark', [
                'as' => 'live_search_trademark',
                'uses' => 'Trademark_Controller@live_search_trademark'
            ]);

            Route::get('update/{id}', [
                'as' => 'update_trademark',
                'uses' => 'Trademark_Controller@update_trademark'
            ]);

            Route::post('updates/{id}', [
                'as' => 'post_update_trademark',
                'uses' => 'Trademark_Controller@post_update_trademark'
            ]);

            Route::get('delete/{id}', [
                'as' => 'delete_trademark',
                'uses' => 'Trademark_Controller@delete_trademark'
            ]);
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('create', [
                'as' => 'create_product',
                'uses' => 'Product_Controller@create_product'
            ]);

            Route::post('create', [
                'as' => 'post_create_product',
                'uses' => 'Product_Controller@post_create_product'
            ]);

            Route::get('list', [
                'as' => 'a.list_product',
                'uses' => 'Product_Controller@list_product'
            ]);

            Route::get('sort_product', [
                'as' => 'a.sort_product',
                'uses' => 'Product_Controller@sort_product'
            ]);

            Route::post('paginate', [
                'as' => 'a.paginate',
                'uses' => 'Product_Controller@paginate'
            ]);

            Route::get('live_search_product', [
                'as' => 'a.live_search_product',
                'uses' => 'Product_Controller@live_search_product'
            ]);

            Route::get('show_hide/{id}', [
                'as' => 'show_hide_product',
                'uses' => 'Product_Controller@show_hide_product'
            ]);

            Route::get('show_hot/{id}', [
                'as' => 'show_hot_product',
                'uses' => 'Product_Controller@show_hot_product'
            ]);

            Route::get('update/{id}', [
                'as' => 'update_product',
                'uses' => 'Product_Controller@update_product'
            ]);

            Route::post('updates/{id}', [
                'as' => 'post_update_product',
                'uses' => 'Product_Controller@post_update_product'
            ]);

            Route::get('delete/{id}', [
                'as' => 'delete_product',
                'uses' => 'Product_Controller@delete_product'
            ]);
        });

        Route::group(['prefix' => 'order'], function () {
            Route::get('order-new', [
                'as' => 'order_new',
                'uses' => 'Order_Controller@order_new'
            ]);

            Route::get('order-onbyway', [
                'as' => 'order_onbyway',
                'uses' => 'Order_Controller@order_onbyway'
            ]);

            Route::get('order-done', [
                'as' => 'oder_done',
                'uses' => 'Order_Controller@order_done'
            ]);

            Route::get('order-details/{id}', [
                'as' => 'order_details',
                'uses' => 'Order_Controller@order_details'
            ]);
            Route::get('order-details/duyet/{id}', [
                'as' => 'accept',
                'uses' => 'Order_Controller@accept'
            ]);
            Route::get('order-details/danggiao/{id}', [
                'as' => 'onbyway',
                'uses' => 'Order_Controller@onbyway'
            ]);

            Route::get('order-details/dagiao/{id}', [
                'as' => 'done',
                'uses' => 'Order_Controller@done'
            ]);
            Route::get('order-delete/{id}', [
                'as' => 'del_oder',
                'uses' => 'Order_Controller@del_oder'
            ]);
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('list-comment', [
                'as' => 'list_comment',
                'uses' => 'User_Controller@list_comment'
            ]);
            Route::get('list-customer', [
                'as' => 'list_customer',
                'uses' => 'User_Controller@list_customer'
            ]);
            Route::get('delete-customer/{id}', [
                'as' => 'del_customer',
                'uses' => 'User_Controller@del_customer'
            ]);
            Route::get('delete-comment/{id}', [
                'as' => 'del_comment',
                'uses' => 'User_Controller@del_comment'
            ]);
            Route::get('list-user', [
                'as' => 'list_user',
                'uses' => 'User_Controller@list_user'
            ]);
            Route::get('delete-user/{id}', [
                'as' => 'del_user',
                'uses' => 'User_Controller@del_user'
            ]);
            Route::get('list-rate', [
                'as' => 'list_rate',
                'uses' => 'User_Controller@list_rate'
            ]);
            Route::get('delete/{id}', [
                'as' => 'del_rate',
                'uses' => 'User_Controller@del_rate'
            ]);
        });

        Route::group(['prefix' => 'admin'], function () {
            Route::get('list', [
                'as' => 'list_admin',
                'uses' => 'Admin_Controller@list_admin'
            ]);
            Route::get('delete/{id}', [
                'as' => 'del_admin',
                'uses' => 'Admin_Controller@del_admin'
            ]);
        });
        Route::group(['prefix' => 'history'], function () {
            Route::get('list', [
                'as' => 'history_action',
                'uses' => 'Admin_Controller@list_history'
            ]);
        });
    });
});
