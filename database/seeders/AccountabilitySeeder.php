<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accountability;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Department;

class AccountabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::all()->first();
        $item = Item::all()->first();
        $department = Department::all()->first();

        
        $array = [
            [
            'employee_id' => $employee->getKey(),
            'item_id' => $item->getKey(),           
            'department_id' => $item->getKey(),           
            'status' => 'Pending', 
        ],

        [
            'employee_id' => $employee->getKey(),
            'item_id' => $item->getKey(),           
            'department_id' => $item->getKey(),            
            'status' => 'Received',
      
        ],
        [
            'employee_id' => $employee->getKey(),
            'item_id' => $item->getKey(),           
            'department_id' => $item->getKey(),            
            'status' => 'Received',
        ]
        ];

        foreach($array as $array)
        {
            Accountability::create($array);
        }

    }
}