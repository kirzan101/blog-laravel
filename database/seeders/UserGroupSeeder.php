<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

    $array = [
      [
        'name' => 'Admin',
        'code' => 'ADM',
        'description' => 'Admin usergroup',
      ],
      [
        'name' => 'Information and Communication Technology',
        'code' => 'ICT',
        'description' => 'ICT usergroup',
      ],
      [
        'name' => 'Accounting',
        'code' => 'ACC',
        'description' => 'Accounting usergroup',
      ],
      [
        'name' => 'Front Office',
        'code' => 'FO',
        'description' => 'FO usergroup',
      ]
    ];


    foreach ($array as $arr) {
      UserGroup::create($arr);
    }
  }
}
