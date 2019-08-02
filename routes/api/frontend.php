<?php
// affiliate前台用户路由

Route::group([
        'middleware' => 'api',
        'prefix' => 'user'
], function ($router) {
    // 验证token
    Route::post('me', 'AuthController@me');
    // 用户登录
    Route::post('login', 'AuthController@login');
    // 用户登出
    Route::post('logout', 'AuthController@logout');
    // 用户注册
    Route::post('register', 'AuthController@register');
    // 发重置密码邮件
    Route::post('password/email', 'AuthController@password_email');
    // 重置密码
    Route::post('password/reset', 'AuthController@password_reset');
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

// offer列表和信息
Route::group(['prefix' => 'offer'], function(){
    Route::get('/list', function () {
        return "hello world";
    });

    // offer列表
    Route::post('/list', function () {
        $faker = new App\Fakers\Frontend\OfferFaker;
        $ret = $faker->getList();

        return apiResponse($ret);
    });

    // offer详情
    Route::post('/detail', function () {
        $faker = new App\Fakers\Frontend\OfferFaker;
        $ret = $faker->getDetail();

        return apiResponse($ret);
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
    
});

