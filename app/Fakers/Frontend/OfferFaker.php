<?php

namespace App\Fakers\Frontend;

class OfferFaker {
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
                'payout' => $faker->randomFloat(2),
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
            'list' => $list,
            'map' => [
                
                'offer_category'=>[
                    1 => 'Casino & Crypto',
                    2 => 'Diet',
                    3 => 'Sweepstakes',
                    4 => 'ED/Muscle',
                    5 => 'Skin',
                    6 => 'Other',
                ],
                'offer_status'=>[ 
                    1 =>'paid',
                    0 =>'pending',
                ],
            ]
        ];

        return $ret;
    }

    public function getDetail(){
        $faker = \Faker\Factory::create();

        $info = [
            'id' => $faker->randomDigit,
            'description' => $faker->sentence(),
            'name' => $faker->name,
            'offer_code' => $faker->name,
            'category' => $faker->randomElement([1,2,3,4,5,6]),
            'payout' => $faker->randomFloat(2),
            'epc' => $faker->randomFloat(2, 0, 1),
            'status' => $faker->randomElement([0,1]),
            'expired_time' => $faker->date(),
        ];
        
        $ret = [
            'basic_info' => $info,
            'map' => [
                'offer_category'=>[
                    1 => 'Casino & Crypto',
                    2 => 'Diet',
                    3 => 'Sweepstakes',
                    4 => 'ED/Muscle',
                    5 => 'Skin',
                    6 => 'Other',
                ],
                'offer_status'=>[ 
                    1 =>'paid',
                    0 =>'pending',
                ],
                
            ]
        ];

        return $ret;
    }
}