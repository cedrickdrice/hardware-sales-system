<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return '$request->user();';
// });

Route::namespace('api')->group(function(){

    /* - - - - - - - - - - PRODUCTS - - - - - - - - - - */
    Route::prefix('product')->group(function(){
        /* - - - - - GET METHOD - - - - - */
        Route::get('/',                                     'ProductAPIController@getIndex');
        Route::get('/{offset}/{limit}',                     'ProductAPIController@getLimit');
        Route::get('/search/{keyword}',                     'ProductAPIController@getSearch');
        Route::get('/scan/{code}',                          'ProductAPIController@getScan');
        Route::get('/filter/{category_id}',                 'ProductAPIController@getFilterByCategory');
        Route::get('/filter/{category_id}/{offset}/{limit}','ProductAPIController@getFilterByCategoryLimit');
        Route::get('/search/{keyword}/{offset}/{limit}',    'ProductAPIController@getSearchLimit');
        Route::get('/filter/{category_id}/{gender_id}',     'ProductAPIController@getFilterByCategoryAndGender');
        Route::get('/size',                                 'ProductAPIController@getSizes');
        Route::get('/newest',                               'ProductAPIController@getLatest');
        Route::get('/popular',                              'ProductAPIController@getMostPopular');
        Route::get('/review/find/{product_id}/{user_id}',   'ProductAPIController@getFindReview');
        /* - - - - - POST METHOD - - - - - */
        Route::post('/review/add',                          'ProductAPIController@postAddReview');
    });


    /* - - - - - - - - - - USERS - - - - - - - - - - */
    Route::prefix('user')->group(function(){
        /* - - - - - GET METHOD - - - - - */
        Route::get('/{id}',                     'UserAPIController@getInfo');
        Route::get('/reset/{email}',            'UserAPIController@getResetPassword');
        Route::get('/resend-code/{id}',         'UserAPIController@getResendCode');
        Route::get('/create/custom',            'UserAPIController@getCreate');
        Route::get('/login/{customer_code}',    'UserAPIController@getLoginByCustomerCode'); 
        /* - - - - - POST METHOD - - - - - */
        Route::post('/login',                   'UserAPIController@postLogin');
        Route::post('/verify',                  'UserAPIController@postVerify');
        Route::post('/register',                'UserAPIController@postRegister');
        Route::post('/update',                  'UserAPIController@postUpdate');
        Route::post('/change/password/update',  'UserAPIController@postChangePassword');
    });

    
    /* - - - - - - - - - - CARTS - - - - - - - - - - */
    Route::prefix('cart')->group(function(){
        /* - - - - - GET METHOD - - - - - */
        Route::get('/',                          'CartAPIController@getAll');
        Route::get('/{user_id}/platform/{platform}', 'CartAPIController@getAllByPlatform');
        Route::get('/{user_id}/{platform?}',     'CartAPIController@getIndex');
        Route::get('/remove/item/{item_id}',           'CartAPIController@getRemoveItem');
        // Route::get('add/{item_id}',              'CartAPIController@getAddItem');
        /* - - - - - POST METHOD - - - - - */
        Route::post('/add',                      'CartAPIController@postAddItem');
        Route::post('/pay',                      'CartAPIController@postPayment');
        Route::post('/update/item',              'CartAPIController@postUpdate');
    }); 

    
    /* - - - - - - - - - - WISHLIST - - - - - - - - - - */
    Route::prefix('wishlist')->group(function(){
        /* - - - - - GET METHOD - - - - - */
        Route::get('/{user_id}',                        'WishlistAPIController@getIndex');
        Route::get('/remove/{wishlist_id}',             'WishlistAPIController@getRemoveItem');
        Route::get('/remove/{product_id}/{user_id}',    'WishlistAPIController@getRemoveItemByProduct');
        /* - - - - - POST METHOD - - - - - */
        Route::post('/add',                             'WishlistAPIController@postAddItem');

    }); 

    /* - - - - - - - - - - MIRROR LOGS - - - - - - - - - - */
    Route::prefix('log')->group(function(){
        /* - - - - - GET METHOD - - - - - */
        Route::get('/',                           'MirrorLogsController@getLoggedInUser');
        Route::get('/in/{id}',                    'MirrorLogsController@login');
        Route::get('/out/{id}',                   'MirrorLogsController@logout');
        Route::get('/in/{code}/{id}',             'MirrorLogsController@loginByCode');
    }); 

    /* - - - - - - - - - - CATEGORIES - - - - - - - - - - */
    Route::prefix('category')->group(function(){
        Route::get('/{type}',                     'CategoryAPIController@getCategories');
    });

    /* - - - - - - - - - - ORDERS - - - - - - - - - - */
    Route::prefix('order')->group(function(){
        Route::get('/{user_id}',                    'OrderAPIController@getOrders');
        Route::get('/cancel/{order_id}',            'OrderAPIController@getCancel');
        Route::get('/helper/crypt/{amount}',        'OrderAPIController@getCrypt');
        Route::post('/return',                      'OrderAPIController@postReturn');
    });

    /* - - - - - - - - - - GALLERIES - - - - - - - - - - */
    Route::prefix('gallery')->group(function(){
        Route::get('/{user_id}',                   'GalleryAPIController@getIndex');
        Route::get('/delete/{gallery_id}',         'GalleryAPIController@getDelete');
        Route::post('/upload/{user_id}',           'GalleryAPIController@postUpload');
    });

    /* - - - - - - - - - - QR Codes - - - - - - - - - - */
    Route::prefix('qr')->group(function(){
        Route::get('/new',                          'QrCodeController@getNew');
        Route::get('/image',                        'QrCodeController@getQrImage');
        Route::get('/user/{id}',                    'QrCodeController@getUserQrImage');
    });
    
});
