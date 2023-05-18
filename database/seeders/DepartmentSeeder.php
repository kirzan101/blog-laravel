<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $array = [
            [
                'name' => 'Information and Communication Technology',
                'code' => 'ICT',
                'description' => 'ICT usergroup',
                'contact_number' => '0000001'
            ],
            [
                'name' => 'Accounting',
                'code' => 'ACC',
                'description' => 'Accounting usergroup',
                'contact_number' => '0000002'
            ],
            [
                'name' => 'Front Office',
                'code' => 'FO',
                'description' => 'FO usergroup',
                'contact_number' => '03'
            ]
        ];

        foreach ($array as $array) {
            Department::create($array);
        }
    }
}
