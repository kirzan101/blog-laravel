<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'description' => 'Intel Celeron',
                'brand' => 'ZH&K',
                'model' => 'Android 18',
                'department_id' => '123',
                'supplier_id' => '123',
            ],

            [
                'description' => 'Superman',
                'brand' => 'Samsung',
                'model' => 'Android17',
                'department_id' => '14',
                'supplier_id' => '14',
            ],
        ];

        foreach ($array as $arr) {
            Item::create($arr);
        }
    }
}
