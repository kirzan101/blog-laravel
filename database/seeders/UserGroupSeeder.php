<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\UserGroup;



class UserGroupSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // UserGroup::create([
    //     'name' => 'test2'
    // ]);
    $departments = Department::all();
    $array = [
      [
        'name' => 'Admin',
        'code' => 'ADM',
        'description' => 'Admin usergroup',
        'department_id' => $departments->where('code', 'ICT')->first()->getKey()
       
      ],
      [
        'name' => 'Information and Communication Technology',
        'code' => 'ICT',
        'description' => 'ICT usergroup',
        'department_id' => $departments->where('code', 'ICT')->first()->getKey()
        
      ],
      [
        'name' => 'Accounting',
        'code' => 'ACC',
        'description' => 'Accounting usergroup',
        'department_id' => $departments->where('code', 'ACC')->first()->getKey()
      ],
      [
        'name' => 'Front Office',
        'code' => 'FO',
        'description' => 'FO usergroup',
        'department_id' => $departments->where('code', 'FO')->first()->getKey()
      
      ]
    ];


    foreach ($array as $arr) {
      UserGroup::create($arr);
    }
  }
}
