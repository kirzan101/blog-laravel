<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accountability;

class AccountabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // Accountability::create([
        //     'status' => 'test5'
        // ]);
        
        $array = [
            [
            'employee_id' => '2445',
            'item_id' => '1708',           
            'department_id' => '1498',           
            'status' => 'Pending', 
        ],

        [
            'employee_id' => '1298',
            'item_id' => '6540',           
            'department_id' => '3456',           
            'status' => 'Received',
      
        ]

        ];

        foreach($array as $array)
        {
            Accountability::create($array);
        }

    }
}