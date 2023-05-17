<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use App\Models\UserGroup;
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
        // $array = [
        // [
        //     'first_name' => 'Rosalinda',
        //     'middle_name' => 'Albay',
        //     'last_name' => 'Rendon',
        //     'contact_number' => '09664466114',
        //     'position' => 'President',
        //     'department_id' => '13455',
        //     'user_id' => '1100364',
        // ] ,

        // [
        //     'first_name' => 'Rosalinda',
        //     'middle_name' => 'Albay',
        //     'last_name' => 'Rendon',
        //     'contact_number' => '09664466114',
        //     'position' => 'President',
        //     'department_id' => '2654332',
        //     'user_id' => '1900364',
        // ]   ,

        // [
        //     'first_name' => 'Rosalinda',
        //     'middle_name' => 'Albay',
        //     'last_name' => 'Rendon',
        //     'contact_number' => '09664466114',
        //     'position' => 'President',
        //     'department_id' => '654322',
        //     'user_id' => '00364',
        // ]
        // ];


        // foreach($array as $array)
        // {
        //     Employee::create($array);

        // }

        $department = Department::where('code', 'ICT')->first();
        $user_group = UserGroup::where('code', 'ADM')->first();

        if ($department && $user_group) {
            $arrays = [
                [ //start here
                    'user' => [
                        'username' => 'admin',
                        'email' => 'admin@astoria.com.ph',
                        'password' => bcrypt('admin'),
                        'user_group_id' => $user_group->getKey()

                    ],
                    'employee' => [
                        'first_name' => 'Admin',
                        'middle_name' => '',
                        'last_name' => 'User',
                        'contact_number' => '0000000000',
                        'position' => 'System Admin',
                        'department_id' => $department->getKey()
                    ]
                ] //end here
                , [
                    'user' => [
                        'username' => 'cescamilla',
                        'email' => 'christian.escamilla@astoria.com.ph',
                        'password' => bcrypt('pogi'),
                        'user_group_id' => $user_group->getKey()
                    ],
                    'employee' => [
                        'first_name' => 'Christian',
                        'middle_name' => '',
                        'last_name' => 'Escamilla',
                        'contact_number' => '0000000000',
                        'position' => 'Software Engineer',
                        'department_id' => $department->getKey()
                    ]
                ]
            ];

            foreach ($arrays as $array) {
                $user = User::create($array['user']);

                // array_push($array->employee, ['user_id' => $user->getKey]);

                $existing_array = $array['employee'];
                $new_array = ['user_id' => $user->getKey()];

                
                $final_array = array_merge($existing_array, $new_array);
            
                Employee::create($final_array);
            }
        }
    }
}
