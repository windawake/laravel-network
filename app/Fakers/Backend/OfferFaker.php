<?php

namespace App\Fakers\Backend;

class OfferFaker {
    public function getList(){
        $faker = \Faker\Factory::create();

        $list = [];
        for ($i = 0; $i < 20; $i++) {
            $info = [
                'id' => $faker->unique()->randomNumber(),
                'name' => $faker->name,
                'category_id' => $faker->randomElement([1,2,3,4,5,6]),
                'description' => $faker->sentence(),
                'payout' => $faker->randomFloat(2, 0, 30),
                'status' => $faker->randomElement([0,1]),
                'expired_time' => strtotime($faker->date()),
                'create_time' => strtotime($faker->date()),
                'update_time' => strtotime($faker->date()),
                'creator' => $faker->name,
                'modifier' => $faker->name,
            ];
            $list[] = $info;
        }
        
        $ret = [
            'pageSize' => 20,
            'current' => $faker->randomDigit,
            'total' => 100,
            'list' => $list
        ];

        return $ret;
    }

    public function getDetail(){
        $faker = \Faker\Factory::create();

        $ret = [
            'basic_info' => [
                'id' => $faker->unique()->randomNumber(),
                'description' => $faker->sentence(),
                'offer_name' => $faker->name,
                'country_id' => $faker->randomNumber(),
                'category_id' => $faker->numberBetween(1,6),
                'payout' => $faker->randomFloat(2, 0, 30),
                'epc' => $faker->randomFloat(2, 0, 1),
                'status' => $faker->randomElement([0,1]),
                'expired_time' => strtotime($faker->date()),
            ],
            'offer_page' => [
                [
                    'offer_id' => $faker->unique()->randomNumber(),
                    'offer_name' => $faker->name,
                    'page_download_url' => $faker->url,
                ],
                [
                    'offer_id' => $faker->unique()->randomNumber(),
                    'offer_name' => $faker->name,
                    'page_download_url' => $faker->url,
                ],
                [
                    'offer_id' => $faker->unique()->randomNumber(),
                    'offer_name' => $faker->name,
                    'page_download_url' => $faker->url,
                ],
            ],
        ];

        return $ret;
    }
}