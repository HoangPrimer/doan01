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

    Route::get('search-sort', [
        'as' => 'search_sort',
        'uses' => 'Home_Controller@search_sort'
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
    Route::get('user/profile', [
        'as' => 'profile',
        'uses' => 'Profile_Controller@profile'
    ]);

    Route::post('user/profile/avatar', [
        'as' => 'avatar',
        'uses' => 'Profile_Controller@avatar'
    ]);

    Route::post('user/profiles', [
        'as' => 'profiles',
        'uses' => 'Profile_Controller@profiles'
    ]);

    Route::get('user/chi-tiet-don-hang/{id}', [
        'as' => 'user_order_details',
        'uses' => 'Profile_Controller@order_details'
    ]);
});

// san pham theo danh muc
Route::group(['namespace' => 'User'], function () {

    // sản phẩm theo danh mục
    Route::get('danh-muc/{id}', [
        'as' => 'category.index',
        'uses' => 'Category_Product_Controller@index'
    ]);

    // sap  xep 
    Route::get('sap-xep', [
        'as' => 'category.sort',
        'uses' => 'Category_Product_Controller@sort'
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

        Route::group(['prefix' => 'profile'], function () {

            Route::get('/{id}', [
                'as' => 'admin_profile',
                'uses' => 'Profile_Controller@admin_profile'
            ]);
            Route::post('updates/{id}', [
                'as' => 'post_update_profile',
                'uses' => 'Profile_Controller@post_update_profile'
            ]);
          
        });


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

        Route::group(['prefix' => 'don-hang'], function () {

            // don hang moi
            Route::get('don-hang-moi', [
                'as' => 'order_new',
                'uses' => 'Order_Controller@order_new'
            ]);

            Route::get('don-hang-moi/sort', [
                'as' => 'sort_order_new',
                'uses' => 'Order_Controller@sort_order_new'
            ]);

            Route::get('don-hang-moi/search', [
                'as' => 'live_search_order_new',
                'uses' => 'Order_Controller@live_search_order_new'
            ]);

            // don hang dang giao
            Route::get('don-dang-giao', [
                'as' => 'order_onbyway',
                'uses' => 'Order_Controller@order_onbyway'
            ]);

            Route::get('don-dang-giao/sort', [
                'as' => 'sort_order_onbyway',
                'uses' => 'Order_Controller@sort_order_onbyway'
            ]);

            Route::get('don-dang-giao/search', [
                'as' => 'live_search_order_onbyway',
                'uses' => 'Order_Controller@live_search_order_onbyway'
            ]);

            // don hang da giao
            Route::get('don-da-giao', [
                'as' => 'order_done',
                'uses' => 'Order_Controller@order_done'
            ]);

            Route::get('don-da-giao/sort', [
                'as' => 'sort_order_done',
                'uses' => 'Order_Controller@sort_order_done'
            ]);

            Route::get('don-da-giao/search', [
                'as' => 'live_search_order_done',
                'uses' => 'Order_Controller@live_search_order_done'
            ]);

            // đoen đã hủy
            Route::get('don-da-huy', [
                'as' => 'order_cancel',
                'uses' => 'Order_Controller@order_cancel'
            ]);

            Route::get('don-da-huy/sort', [
                'as' => 'sort_order_cancel',
                'uses' => 'Order_Controller@sort_order_cancel'
            ]);

            Route::get('don-da-huy/search', [
                'as' => 'live_search_order_cancel',
                'uses' => 'Order_Controller@live_search_order_cancel'
            ]);


            // chi tiết đơn hàng
            Route::get('chi-tiet/{id}', [
                'as' => 'order_details',
                'uses' => 'Order_Controller@order_details'
            ]);

            Route::get('hanh-dong/{id}/{key}', [
                'as' => 'action',
                'uses' => 'Order_Controller@action'
            ]);

            Route::get('xoa/{id}', [
                'as' => 'del_order',
                'uses' => 'Order_Controller@del_order'
            ]);

            // Route::get('chi-tiet/back', [
            //     'as' => 'order.back',
            //     'uses' => 'Order_Controller@back'
            // ]);
        });

        Route::group(['prefix' => 'user'], function () {

            // ---------------------------- comment ----------------------------------------//

            // danh sách
            Route::get('list-comment', [
                'as' => 'list_comment',
                'uses' => 'User_Controller@list_comment'
            ]);

            // sắp xếp
            Route::get('list-comment/sort', [
                'as' => 'sort_comment',
                'uses' => 'User_Controller@sort_comment'
            ]);

            // tìm kiếm
            Route::get('list-comment/search', [
                'as' => 'live_search_comment',
                'uses' => 'User_Controller@live_search_comment'
            ]);

            // xóa 
            Route::get('delete-comment/{id}', [
                'as' => 'del_comment',
                'uses' => 'User_Controller@del_comment'
            ]);


            // ---------------------------- đánh giá ----------------------------------------//

            // danh sách
            Route::get('list-rate', [
                'as' => 'list_rate',
                'uses' => 'User_Controller@list_rate'
            ]);

            // sắp xếp
            Route::get('list-rate/sort', [
                'as' => 'sort_rate',
                'uses' => 'User_Controller@sort_rate'
            ]);

            // tìm kiếm
            Route::get('list-rate/search', [
                'as' => 'live_search_rate',
                'uses' => 'User_Controller@live_search_rate'
            ]);

            // xóa 
            Route::get('delete-rate/{id}', [
                'as' => 'del_rate',
                'uses' => 'User_Controller@del_rate'
            ]);


            // ----------------------------  người dùng ----------------------------------------//

            // danh sách
            Route::get('list-user', [
                'as' => 'list_user',
                'uses' => 'User_Controller@list_user'
            ]);

            // sắp xếp
            Route::get('list-user/sort', [
                'as' => 'sort_user',
                'uses' => 'User_Controller@sort_user'
            ]);

            // tìm kiếm
            Route::get('list-user/search', [
                'as' => 'live_search_user',
                'uses' => 'User_Controller@live_search_user'
            ]);

            // xóa 
            Route::get('delete-user/{id}', [
                'as' => 'del_user',
                'uses' => 'User_Controller@del_user'
            ]);


            // ---------------------------- khách hàng ----------------------------------------//

            // danh sách
            Route::get('list-customer', [
                'as' => 'list_customer',
                'uses' => 'User_Controller@list_customer'
            ]);

            // sắp xếp
            Route::get('list-customer/sort', [
                'as' => 'sort_customer',
                'uses' => 'User_Controller@sort_customer'
            ]);

            // tìm kiếm
            Route::get('list-customer/search', [
                'as' => 'live_search_customer',
                'uses' => 'User_Controller@live_search_customer'
            ]);

            // xóa 
            Route::get('delete-customer/{id}', [
                'as' => 'del_customer',
                'uses' => 'User_Controller@del_customer'
            ]);
        });

        Route::group(['prefix' => 'admin'], function () {


            // ---------------------------- comment ----------------------------------------//

            // danh sách
            Route::get('list', [
                'as' => 'list_admin',
                'uses' => 'Admin_Controller@list_admin'
            ]);

            // sắp xếp
            Route::get('list/sort', [
                'as' => 'sort_admin',
                'uses' => 'Admin_Controller@sort_admin'
            ]);

            // tìm kiếm
            Route::get('list/search', [
                'as' => 'live_search_admin',
                'uses' => 'Admin_Controller@live_search_admin'
            ]);

            // xóa 
            Route::get('delete/{id}', [
                'as' => 'del_admin',
                'uses' => 'Admin_Controller@del_admin'
            ]);

            Route::get('history', [
                'as' => 'history',
                'uses' => 'Admin_Controller@list_history'
            ]);
        });
    });
});
