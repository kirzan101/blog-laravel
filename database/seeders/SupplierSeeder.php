<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;


class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $array = [
        [
            'name' => 'Apple',
            'address' => 'Narvacan',
            'contact_number' => '375629579',
        ]   ,

        [
            'name' => 'Apple2',
            'address' => 'Narvacan',
            'contact_number' => '778347564',
        ]   ,
        [
            'name' => 'Apple3',
            'address' => 'Narvacan',
            'contact_number' => '847539450',
        ]
    ];
        //

    foreach($array as $array) 
        {
            Supplier::create($array);
        }
    }
}