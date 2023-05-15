<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
        [
            'first_name' => 'first_name',
            'middle_name' => 'middle_name',
            'last_name' => 'last_name',
            'contact_number' => 'contact_number',
            'position' => 'position',
            'department_id' => 'department_id',
            'user_id' => 'user_id',
        ] ,

        [
            'first_name' => 'first_name',
            'middle_name' => 'middle_name',
            'last_name' => 'last_name',
            'contact_number' => 'contact_number',
            'position' => 'position',
            'department_id' => 'department_id',
            'user_id' => 'user_id',
        ]   ,

        [
            'first_name' => 'first_name',
            'middle_name' => 'middle_name',
            'last_name' => 'last_name',
            'contact_number' => 'contact_number',
            'position' => 'position',
            'department_id' => 'department_id',
            'user_id' => 'user_id',
        ]
        ];
           
        
        foreach($array as $array)
        {
            Employee::create($array);

        }
    }
}