<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\UserGroup;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{

    public function run(): void
    {

        // select all stocks
        $item = Item::first();
        $user_group = UserGroup::first();
        $supplier = Supplier::first();

            $arrays = [
                [
                    //start here
                    'user' => [
                        'username' => 'adminstock',
                        'email' => 'stock@gmail.com.ph',
                        'password' => bcrypt('stockadmin'),
                        'user_group_id' => $user_group->getKey()
                    ],
                    'stock' => [
                        'code' => 'AB14',
                        'serial_number' => 'SRN 9659658',
                        'manufacture_date' => '2023-07-20',
                        'item_id' => $item->getKey(),
                    ]
                ] //end here
                , [
                    'user' => [
                        'username' => 'adminanna',
                        'email' => 'admin.anna@gmail.com.ph',
                        'password' => bcrypt('annaadmin'),
                        'user_group_id' => $user_group->getKey()
                    ],
                    'stock' => [
                        'code' => 'AB34',
                        'serial_number' => 'SRN 987954',
                        'manufacture_date' => '2023-09-21',
                        'item_id' => $item->getKey(),
                    ]
                ]
            ];

            foreach ($arrays as $array) {
                $user = User::create($array['user']);

                // to get the key

                $existing_array = $array['stock'];
                $new_array = ['code' => $user->getKey()];


                $final_array = array_merge($existing_array, $new_array);

                Stock::create($final_array);
            }
    }
}