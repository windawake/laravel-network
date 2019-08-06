<?php

// affiliate前台用户路由

Route::namespace('Frontend')->group(function(){
    Route::group(['prefix' => 'user'], function () {
        // 用户登录
        Route::post('login', 'UserController@login');
        // 用户注册
        Route::post('register', 'UserController@register');
    });
});


Route::group(['namespace' => 'Frontend', 'middleware' => 'auth:api'], function(){
    Route::group(['prefix' => 'user'], function () {
        // 验证token
        Route::post('me', 'UserController@me');
        // 用户登出
        Route::post('logout', 'UserController@logout');
        // 发重置密码邮件
        Route::post('password/email', 'UserController@password_email');
        // 重置密码
        Route::post('password/reset', 'UserController@password_reset');
    });

    // offer列表和信息
    Route::group(['prefix' => 'offer'], function () {
        // offer列表
        Route::post('list', function () {
            $faker = new App\Fakers\Frontend\OfferFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        // offer详情
        Route::post('detail', function () {
            $faker = new App\Fakers\Frontend\OfferFaker;
            $ret = $faker->getDetail();

            return apiResponse($ret);
        });

        // offer保存
        Route::post('update', function () {

            return apiResponse();
        });
    });

    // 账号配置信息
    Route::group(['prefix' => 'account'], function(){
        Route::post('settings', function(){
            $faker = new App\Fakers\Frontend\AccountFaker;
            $ret = $faker->getSettings();
        
            return apiResponse($ret);
        });
        
        Route::post('settings/update', function(){
            return apiResponse();
        });
        
        // 用户billing
        Route::post('billing', function(){
            $faker = new App\Fakers\Frontend\AccountFaker;
            $ret = $faker->getBilling();
        
            return apiResponse($ret);
        });
        
        Route::post('billing/update', function(){
            return apiResponse();
        });
    });

    // 字段映射数组
    Route::post('map', function () {
        $faker = new App\Fakers\MapFaker;
        $ret = $faker->getFrontendMap();

        return apiResponse($ret);
    });

    // 模糊匹配接口
    Route::post('match', function() {
        $faker = new App\Fakers\MatchFaker;
        $ret = $faker->getFrontendSearch();

        return apiResponse($ret);
    });

    // dashboard统计
    Route::group(['prefix' => 'dashboard'], function(){
        Route::post('/summary_revenue', function () {
            $faker = new App\Fakers\Frontend\DashboardFaker;
            $ret = $faker->summary_revenue();

            return apiResponse($ret);
        });

        Route::post('/my_offers', function () {
            $faker = new App\Fakers\Frontend\DashboardFaker;
            $ret = $faker->my_offers();

            return apiResponse($ret);
        });
        
        Route::post('/performance', function () {
            $faker = new App\Fakers\Frontend\DashboardFaker;
            $ret = $faker->performance();

            return apiResponse($ret);
        });

        Route::post('/payout', function () {
            $faker = new App\Fakers\Frontend\DashboardFaker;
            $ret = $faker->payout();

            return apiResponse($ret);
        });
    });


    // reports报表
    Route::group(['prefix' => 'reports'], function(){
        Route::post('/summary', function () {
            $faker = new App\Fakers\Frontend\ReportsFaker;
            $ret = $faker->getSummary();

            return apiResponse($ret);
        });

        Route::post('/order', function () {
            $faker = new App\Fakers\Frontend\ReportsFaker;
            $ret = $faker->getOrderList();

            return apiResponse($ret);
        });

        Route::post('/bonus', function () {
            $faker = new App\Fakers\Frontend\ReportsFaker;
            $ret = $faker->getBonusList();

            return apiResponse($ret);
        });
    });

    // domain模块
    Route::group(['prefix' => 'domain'], function(){
        Route::post('/list', function () {
            $faker = new App\Fakers\Frontend\DomainFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        Route::post('/update', function () {
            return apiResponse();
        });
    });


    // postback模块
    Route::group(['prefix' => 'postback'], function(){
        Route::post('/list', function () {
            $faker = new App\Fakers\Frontend\PostbackFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        Route::post('/update', function () {
            return apiResponse();
        });

        Route::post('/delete', function () {
            return apiResponse();
        });
    });

    // payout模块
    Route::group(['prefix' => 'payout'], function(){
        Route::post('/list', function () {
            $faker = new App\Fakers\Frontend\PayoutFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        Route::post('/detail', function () {
            $faker = new App\Fakers\Frontend\PayoutFaker;
            $ret = $faker->getDetail();

            return apiResponse($ret);
        });
    });
});

