<?php

namespace App\Fakers\Backend;

class CreativeFaker {
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
            'id' => $faker->unique()->randomNumber(),
            'description' => $faker->sentence(),
            'name' => $faker->name,
            'category_id' => $faker->randomElement([1,2,3,4,5,6]),
            'payout' => $faker->randomFloat(2, 0, 30),
            'epc' => $faker->randomFloat(2, 0, 1),
            'status' => $faker->randomElement([0,1]),
            'expired_time' => strtotime($faker->date()),
        ];

        return $ret;
    }
}