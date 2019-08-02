<?php

Route::post('/offer/list', function () {
    $faker = new App\Fakers\Backend\OfferFaker;

    $ret = $faker->getList();

    return apiResponse($ret);
});





