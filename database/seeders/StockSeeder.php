<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{

    public function run(): void
    {
        //

        $array = [
            [
                'code' => 'AB12',
                'serial_number' => 'SRN 8495894',
                'manufacture_date' => '2023-04-03',
                'item_id' => '20',
                'supplier_id' => '35',
            ],

            [
                'code' => 'AB13',
                'serial_number' => 'SRN 7565688',
                'manufacture_date' => '2023-06-15',
                'item_id' => '23',
                'supplier_id' => '36',
            ],

            [
                'code' => 'AB14',
                'serial_number' => 'SRN 9659658',
                'manufacture_date' => '2023-07-20',
                'item_id' => '25',
                'supplier_id' => '38',
            ]


        ];


        foreach ($array as $array) {
            Stock::create($array);
        }
    }
}