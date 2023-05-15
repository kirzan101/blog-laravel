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
         // Department::create([
        //     'description' => 'test2'
        // ]);

    
$array =[
    [
        'name'=> 'A1',
        'code'=> 'test2',
        'contact_number'=> '12345',
        'description'=> 'test4',

    ],

    [
        'name'=> 'A2',
        'code'=> 'test2',
        'contact_number'=> '12345',
        'description'=> 'test4',

    ],
    [
        'name'=> 'a3',
        'code'=> 'test2',
        'contact_number'=> '12345',
        'description'=> 'test4',

    ]
    ];

        foreach($array as $arr)
        {
            Department::create($arr);
        }
    }
}
