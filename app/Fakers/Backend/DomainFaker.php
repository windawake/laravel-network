<?php

namespace App\Fakers\Backend;

class DomainFaker {
    public function getList(){
        $faker = \Faker\Factory::create();

        $list = [];
        for ($i = 0; $i < 20; $i++) {
            $info = [
                'id' => $faker->randomDigit,
                'domain_url' => $faker->url,
                'domain_type' => $faker->randomElement([1,2]),
                'offer_name' => $faker->name,
                'status' => $faker->randomElement([1,2]),
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