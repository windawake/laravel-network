<?php

namespace App\Fakers\Backend;

class BillingFaker {
    public function getList(){
        $faker = \Faker\Factory::create();

        $list = [];
        for ($i = 0; $i < 20; $i++) {
            $info = [
                'id' => $faker->randomDigit,
                'name' => $faker->name,
                'offer_code' => $faker->name,
                'category' => $faker->randomElement([1,2,3,4,5,6]),
                'description' => $faker->sentence(),
                'payout' => $faker->randomFloat(2, 0, 30),
                'status' => $faker->randomElement([0,1]),
                'expired_time' => $faker->date(),
                'create_time' => $faker->date(),
                'update_time' => $faker->date(),
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
            'id' => $faker->randomDigit,
            'description' => $faker->sentence(),
            'name' => $faker->name,
            'offer_code' => $faker->name,
            'category' => $faker->randomElement([1,2,3,4,5,6]),
            'payout' => $faker->randomFloat(2, 0, 30),
            'epc' => $faker->randomFloat(2, 0, 1),
            'status' => $faker->randomElement([0,1]),
            'expired_time' => $faker->date(),
        ];

        return $ret;
    }
}