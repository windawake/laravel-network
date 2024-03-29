<?php

namespace App\Fakers\Frontend;

class PostbackFaker {
    public function getList(){
        $faker = \Faker\Factory::create();

        $list = [];
        for ($i = 0; $i < 20; $i++) {
            $info = [
                'id' => $faker->unique()->randomNumber(),
                'goal_id' => $faker->randomElement([1,2]),
                'postback_type' => $faker->randomElement([1,2]),
                'offer_id' => $faker->unique()->randomNumber(),
                'offer_name' => $faker->name,
                'url_code' => $faker->url,
                'postback_status' => $faker->randomElement([1,0]),
                'create_time' => strtotime($faker->date()),
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
    
}