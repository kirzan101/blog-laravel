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
            'first_name' => 'Rosalinda',
            'middle_name' => 'Albay',
            'last_name' => 'Rendon',
            'contact_number' => '09664466114',
            'position' => 'President',
            'department_id' => '13455',
            'user_id' => '1100364',
        ] ,

        [
            'first_name' => 'Rosalinda',
            'middle_name' => 'Albay',
            'last_name' => 'Rendon',
            'contact_number' => '09664466114',
            'position' => 'President',
            'department_id' => '2654332',
            'user_id' => '1900364',
        ]   ,

        [
            'first_name' => 'Rosalinda',
            'middle_name' => 'Albay',
            'last_name' => 'Rendon',
            'contact_number' => '09664466114',
            'position' => 'President',
            'department_id' => '654322',
            'user_id' => '00364',
        ]
        ];
           
        
        foreach($array as $array)
        {
            Employee::create($array);

        }
    }
}