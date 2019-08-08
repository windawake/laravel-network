<?php


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


Route::prefix('frontend')->group(function () {

    require_once __DIR__."/api/frontend.php";
});


Route::prefix('backend')->group(function () {

    require_once __DIR__."/api/backend.php";
});
