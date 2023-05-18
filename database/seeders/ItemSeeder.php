<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = Department::all()->first();
        $supplier = Supplier::all()->first();
        // dd($department->getKey(), $supplier->getKey());

        $arrays = [
            [
                'description' => 'With CORE i3',
                'brand' => 'Lenovo',
                'model' => 'Ideapad3 Slim 3',
                'department_id' => $department->getKey(),
                'supplier_id' => $supplier->getKey(),
            ],
            [
                'description' => 'With CORE i7',
                'brand' => 'Lenovo',
                'model' => 'Ideapad3 Slim 3',
                'department_id' => $department->getKey(),
                'supplier_id' => $supplier->getKey(),
            ],
        ];

        foreach ($arrays as $array) {

            Item::create($array);
        }
    }
}
