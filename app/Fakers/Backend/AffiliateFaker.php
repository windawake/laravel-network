<?php

namespace App\Fakers\Backend;

class AffiliateFaker {
    public function getList(){
        $faker = \Faker\Factory::create();

        $list = [];
        for ($i = 0; $i < 20; $i++) {
            $info = [
                'id' => $faker->randomDigit,
                'affiliate_name' => $faker->name,
                'manager_id' => $faker->randomDigit,
                'account_manager' => $faker->name,
                'affiliate_type' => $faker->randomElement([1,2]),
                'status' => $faker->randomElement([0,1]),
                'clicks' => $faker->numberBetween(100, 2000),
                'orders' => $faker->numberBetween(50, 200),
                'conversions' => $faker->numberBetween(20, 60),
                'revenue' =>  $faker->randomFloat(2, 500, 3000),
                'repeat_orders' => $faker->numberBetween(0, 10),
                'repeat_orders_bonus' => $faker->randomFloat(2, 200, 1000),
            ];

            $info['order_click_rate'] = sprintf("%.2f", $info['orders']/$info['clicks']);
            $info['conversion_order_rate'] = sprintf("%.2f", $info['conversions']/$info['orders']);
            $info['conversion_click_rate'] = sprintf("%.2f", $info['conversions']/$info['clicks']);
            $info['total_revenue'] = $info['revenue'] + $info['repeat_orders_bonus'];

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
            'affiliate_name' => $faker->name,
        ];

        return $ret;
    }
}