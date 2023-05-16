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

        $array =[
    [
        'name' => 'A1',
        'code' => '12345672',
        'contact_number' => '12345',
        'description' => 'test4',

    ],

    [
        'name' => 'A2',
        'code' => '7654322',
        'contact_number' => '12345',
        'description' => 'test4',

    ],
    [
        'name' => 'a3',
        'code' => '7654322',
        'contact_number' => '12345',
        'description' => 'test4',

    ]
    ];

        foreach($array as $array)
        {
            Department::create($array);
        }
    }
}
