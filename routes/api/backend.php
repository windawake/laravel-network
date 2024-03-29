<?php
// 后台用户路由
Route::namespace('Backend')->group(function(){
    Route::group(['prefix' => 'admin'], function () {
        // 用户登录
        Route::post('login', 'AdminController@login');
        // 用户注册
        Route::post('register', 'AdminController@register');
    });
});

Route::group(['namespace' => 'Backend', 'middleware' => 'auth:backend'], function(){
    Route::group(['prefix' => 'admin'], function () {
        // 验证token
        Route::post('me', 'AdminController@me');

        Route::post('refresh', 'AdminController@refresh');
        // 用户登出
        Route::post('logout', 'AdminController@logout');
        // 发重置密码邮件
        Route::post('password/email', 'AdminController@password_email');
        // 重置密码
        Route::post('password/reset', 'AdminController@password_reset');
    });

    // dashboard统计
    Route::group(['prefix' => 'dashboard'], function(){
        Route::post('/summary_conversion', function () {
            $faker = new App\Fakers\Backend\DashboardFaker;
            $ret = $faker->summary_conversion();

            return apiResponse($ret);
        });

        // cost
        Route::post('/cost', function () {
            $faker = new App\Fakers\Backend\DashboardFaker;
            $ret = $faker->total_revenue();

            return apiResponse($ret);
        });
        
        Route::post('/performance', function () {
            $faker = new App\Fakers\Backend\DashboardFaker;
            $ret = $faker->performance();

            return apiResponse($ret);
        });
    });

    // offer列表和信息
    Route::group(['prefix' => 'offer'], function(){

        // offer列表
        Route::post('/list', function () {
            $faker = new App\Fakers\Backend\OfferFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        // offer详情
        Route::post('/detail', function () {
            $faker = new App\Fakers\Backend\OfferFaker;
            $ret = $faker->getDetail();

            return apiResponse($ret);
        });

        // offer保存
        Route::post('/save', function () {

            return apiResponse();
        });

    });

    // Creative列表和信息
    Route::group(['prefix' => 'creative'], function(){

        // Creative列表
        Route::post('/list', function () {
            $faker = new App\Fakers\Backend\CreativeFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        // Creative详情
        Route::post('/detail', function () {
            $faker = new App\Fakers\Backend\CreativeFaker;
            $ret = $faker->getDetail();

            return apiResponse($ret);
        });

        // Creative保存
        Route::post('/save', function () {

            return apiResponse();
        });

    });

    // reports报表
    Route::group(['prefix' => 'reports'], function(){
        Route::post('/summary', function () {
            $faker = new App\Fakers\Backend\ReportsFaker;
            $ret = $faker->getSummary();

            return apiResponse($ret);
        });

        Route::post('/order', function () {
            $faker = new App\Fakers\Backend\ReportsFaker;
            $ret = $faker->getOrderList();

            return apiResponse($ret);
        });

        Route::post('/bonus', function () {
            $faker = new App\Fakers\Backend\ReportsFaker;
            $ret = $faker->getBonusList();

            return apiResponse($ret);
        });

        Route::post('/bonus/create', function () {
            return apiResponse();
        });

        Route::post('/billing/generate', function () {
            return apiResponse();
        });
    });

    // Affiliate列表和信息
    Route::group(['prefix' => 'affiliate'], function(){

        // Affiliate列表
        Route::post('/list', function () {
            $faker = new App\Fakers\Backend\AffiliateFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        // Affiliate详情
        Route::post('/detail', function () {
            $faker = new App\Fakers\Backend\AffiliateFaker;
            $ret = $faker->getDetail();

            return apiResponse($ret);
        });

        // Affiliate保存
        Route::post('/save', function () {

            return apiResponse();
        });

    });

    // domain模块
    Route::group(['prefix' => 'domain'], function(){
        Route::post('/list', function () {
            $faker = new App\Fakers\Backend\DomainFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        Route::post('/update', function () {
            return apiResponse();
        });
    });

    // Billing列表和信息
    Route::group(['prefix' => 'billing'], function(){

        // Billing列表
        Route::post('/list', function () {
            $faker = new App\Fakers\Backend\BillingFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        // Billing详情
        Route::post('/detail', function () {
            $faker = new App\Fakers\Backend\BillingFaker;
            $ret = $faker->getDetail();

            return apiResponse($ret);
        });

        // Billing保存
        Route::post('/update', function () {

            return apiResponse();
        });

        // Billing删除
        Route::post('/delete', function () {

            return apiResponse();
        });

    });

    // 后台User列表和信息
    Route::group(['prefix' => 'user'], function(){

        // User列表
        Route::post('/list', function () {
            $faker = new App\Fakers\Backend\UserFaker;
            $ret = $faker->getList();

            return apiResponse($ret);
        });

        // User详情
        Route::post('/detail', function () {
            $faker = new App\Fakers\Backend\UserFaker;
            $ret = $faker->getDetail();

            return apiResponse($ret);
        });

        // User保存
        Route::post('/save', function () {

            return apiResponse();
        });

    });


    // 字段映射数组
    Route::post('map', function () {
        $faker = new App\Fakers\MapFaker;
        $ret = $faker->getBackendMap();

        return apiResponse($ret);
    });

    // 模糊匹配接口
    Route::post('match', function() {
        $faker = new App\Fakers\MatchFaker;
        $ret = $faker->getBackendSearch();

        return apiResponse($ret);
    });

});