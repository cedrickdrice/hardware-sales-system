<?php

Route::group(['middleware' => 'auth'], function(){
    Route::group(["prefix" => "admin", "namespace" => "backend"], function(){
        Route::group(['middleware' => ['admin']], function(){
            Route::group(["prefix" => "dashboard"], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',             'AdminDashboardController@getIndex');
                /* - - - - - POST METHOD - - - - - */
            });

            Route::group(["prefix" => "messages"], function(){
                Route::get('/', function(){
                    return view('back-end.messages.index');
                });
                Route::get('/compose', function(){
                    return view('back-end.messages.includes.tinymce');
                });
            });
            
            Route::group(['prefix' => 'logtrail'], function(){
                Route::get('/', 'LogTrailController@getIndex');
            });
            Route::group(['prefix' => 'audittrail'], function(){
                Route::get('/', 'AuditTrailController@getIndex');
            });
        });
    });

    Route::group(['prefix' => 'icp', 'namespace' => 'backend'], function(){
        Route::group(['middleware' => ['icp']], function(){
            Route::group(["prefix" => "products"], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',             'ProductManagementController@getIndex');
                Route::get('/delete/{id}',  'ProductManagementController@getDelete');
                Route::get('/filter/{word}','ProductManagementController@getFilter');
                Route::get('/search/{word}','ProductManagementController@getSearch');
                Route::get('/edit/{id}',    'ProductManagementController@getEdit');
                Route::get('/editPrice/{id}', 'ProductManagementController@getPriceEdit');
                Route::get('/removeStock/{id}', 'ProductManagementController@getRemoveStock');
                /* - - - - - POST METHOD - - - - - */
                Route::post('/insert',      'ProductManagementController@postInsert');
                Route::post('/update',      'ProductManagementController@postUpdate');
                Route::post('/updatePrice',      'ProductManagementController@postUpdatePrice');
                Route::post('/updateStock',      'ProductManagementController@postUpdateStock');
            });
            Route::group(['prefix' => 'reports'], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',                 'icpReportController@getIndex');
                Route::get('/download_invent',  'icpReportController@getPDF_Inventory');
            });
            Route::group(["prefix" => "orders"], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',                     'OrderManagementController@getIndex');
                Route::get('/detail/{id}',          'OrderManagementController@getOrder');
                Route::get('/update/{id}/{status}', 'OrderManagementController@getUpdate');
                Route::get('/search/{keyword}',     'OrderManagementController@getSearch');
                /* - - - - - POST METHOD - - - - - */
            });
            Route::group(['prefix' => 'categories'], function() {
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',         'CategoryManagementController@getIndex');
                /* - - - - - POST METHOD - - - - - */
                Route::post('/insert',  'CategoryManagementController@postInsert');
            });
            Route::group(['prefix' => 'return'], function() {
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',         'ProductManagementController@getReturnIndex');
                Route::get('/detail/{id}','ProductManagementController@getReturnDetail');
                Route::get('/update/{id}/{status}', 'ProductManagementController@getReturnUpdate');
                /* - - - - - POST METHOD - - - - - */
                Route::post('/insert',  'CategoryManagementController@postInsert');
            });
        });
        
    });

    Route::group(['prefix' => 'manager', 'namespace' => 'backend'], function(){
        Route::group(['middleware' => ['manager']], function(){
            Route::group(["prefix" => "dashboard"], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',             'DashboardController@getIndex');
                /* - - - - - POST METHOD - - - - - */
            });
            Route::group(["prefix" => "customers"], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',             'UserManagementController@getIndex');
                Route::get('/download',     'UserManagementController@getDownload');
                /* - - - - - POST METHOD - - - - - */
            });
            Route::group(["prefix" => "employees"], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/', 'EmployeeManagementController@getIndex');
                Route::get('/delete/{id}', 'EmployeeManagementController@getDelete');
                /* - - - - - POST METHOD - - - - - */
                Route::post('/insert', 'EmployeeManagementController@postInsert');
            });
            Route::group(["prefix" => "medialibrary"], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',             'MediaLibraryController@getIndex');
                /* - - - - - POST METHOD - - - - - */
                Route::post('/insert',      'MediaLibraryController@postInsert');
            });
            Route::group(["prefix" => "reports"], function(){
                /* - - - - - GET METHOD - - - - - */
                Route::get('/',             'ReportManagementController@getIndex');
                Route::get('/download_invent','ReportManagementController@getPDF_Inventory');
                Route::get('/download_sales', 'ReportManagementController@getPDF_Sales');
                /* - - - - - POST METHOD - - - - - */
                Route::post('/search',      'ReportManagementController@postSearch');
            });
            
            Route::group(["prefix" => "supplier"], function(){
                Route::get('/', 'ProductManagementController@getSupplier');
                Route::get('/edit/{id}', 'ProductManagementController@getEditSupplier');
                Route::post('/update',      'ProductManagementController@postUpdateSupplier');
            });
        });
        
    });

    Route::group(["namespace" => "frontend"], function(){
        Route::group(['middleware' => ['client']], function(){
            Route::get('/loginCode', function(){
                return view('login-code');
            });
            Route::post('/updateAccountByCode', 'AccountController@postAccountUpdate');
            
            Route::group(["prefix" => "verify"], function(){
                Route::get('/',           'AccountController@getVerify');
                Route::get('/send-code',  'AccountController@getSendVerification');
                Route::post('/',          'AccountController@postVerify');
            });

            Route::group(['middleware' => ['account-verify']], function(){
                Route::group(["prefix" => "account"], function(){
                    /* - - - - - GET METHOD - - - - - */
                    Route::get('/',                 'AccountController@getIndex');
                    Route::get('/edit_address/{id}','AccountController@getAddress');
                    /* - - - - - POST METHOD - - - - - */
                    Route::post('/update',          'AccountController@postUpdate');
                    Route::post('/insert',          'AccountController@postInsert');
                });
                Route::group(["prefix" => "cart"], function(){
                    /* - - - - - GET METHOD - - - - - */
                    Route::get('/',             'CartController@getIndex');
                    Route::get('/delete/{id}',  'CartController@getDelete');
                    Route::get('/insert/{id}/{sub_id}',  'CartController@getInsert');
                    Route::get('/changeColor/{product_id}/{id}',  'CartController@getChangeColor');
                    Route::get('/changeSize/{size_id}/{id}',  'CartController@getChangeSize');
                    /* - - - - - POST METHOD - - - - - */
                    Route::post('/insert',      'CartController@postInsert');
                    Route::post('/update',      'CartController@postUpdate');
                    Route::post('/payment',     'CartController@postPayment');
                    
                });
                Route::group(["prefix" => "order"], function(){
                    /* - - - - - GET METHOD - - - - - */
                    Route::get('/',             'OrderController@getIndex');
                    Route::get('/detail/{id}',  'OrderController@getDetail');
                    Route::get('/review/{id}/{order_id}',  'OrderController@getProductReview');
                    Route::get('/cancelOrder/{id}', 'OrderController@getCancel');
                   
                    /* - - - - - POST METHOD - - - - - */
                    Route::post('/insert',      'OrderController@postInsert');
                    Route::post('/insert_cod',  'OrderController@postInsertCod');
                    Route::post('/check',      'OrderController@checkoutValidation');
                    Route::group(["prefix" => "return"], function(){
                        /* - - - - - GET METHOD - - - - - */
                        Route::get('/{prod_id}/{order_id}', 'OrderController@getReturn');
                        /* - - - - - POST METHOD - - - - - */
                        Route::post('/add',          'ProductController@postAddReturn');
                    });
                });
                Route::group(["prefix" => "wishlist"], function(){
                    /* - - - - - GET METHOD - - - - - */
                    Route::get('/',                     'WishlistController@getIndex');  
                    Route::get('/add/{id}',             'WishlistController@getAddToCart');
                    Route::get('/delete/{id}',          'WishlistController@getDelete');
                    Route::get('/add-item/{id}',        'WishlistController@getAdd');
                    Route::get('/remove-item/{id}',     'WishlistController@getRemove');
                    /* - - - - - POST METHOD - - - - - */            
                });
                Route::group(["prefix" => "review"], function(){
                    /* - - - - - GET METHOD - - - - - */

                    /* - - - - - POST METHOD - - - - - */
                    Route::post('/add',          'ProductController@postAddReview');
                });
                
            });
        });
   });
});
Route::group(["namespace" => 'frontend'], function(){
    Route::get('/',                 'MainController@getIndex');
    Route::group(["prefix" => "product"], function(){
        /* - - - - - GET METHOD - - - - - */
        Route::get('/{id}',         'ProductController@getIndex');
    });
    
    Route::group(["prefix" => "shop"], function(){
        /* - - - - - GET METHOD - - - - - */
        Route::get('/',                         'ShopController@getIndex');
        Route::get('/range_filter/{min}/{max}', 'ShopController@getRangeFilter');
        Route::get('/filter/{id}',              'ShopController@getFilter');
        Route::get('/filterColor/{id}',         'ShopController@getFilterColor');
        Route::get('/filterGender/{id}',        'ShopController@getFilterGender');
        Route::get('/get/{id}',                 'ShopController@getID');
        Route::get('/getImageOfColor/{id}','ShopController@getImage');
        /* - - - - - POST METHOD - - - - - */
    });
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', 'MainController@getLogin')->name('login');

    Route::get('/forgot-password',          'MainController@getForgotPassword');
    Route::get('/reset-password/{id}',      'MainController@getResetPassword');

    Route::post('/forgot-password',         'MainController@postForgotPassword');
    Route::post('/reset-password',          'MainController@postResetPassword');
});
Route::post('/register', 'MainController@postRegister');
Route::get('/logout', 'MainController@getLogout');
Route::get('/resend/{email}', 'MainController@getResendCode');
Route::post('/signin', 'MainController@postLogin');
Route::post('/verify', 'MainController@postVerify');
Route::post('/verify_forgot', 'MainController@postForgotVerify');
Route::post('/loginWithCode', 'MainController@postCode');

