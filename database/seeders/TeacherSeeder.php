<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrays = [
            [
                'first_name' => 'Angelo1',
                'last_name' => 'tester',
                'email' => 'tester1@mail.com',
                'contact_no' => '00000000'
            ],
            [
                'first_name' => 'Angelo2',
                'last_name' => 'tester',
                'email' => 'tester2@mail.com',
                'contact_no' => '00000000'
            ],
            [
                'first_name' => 'Angelo3',
                'last_name' => 'tester',
                'email' => 'tester3@mail.com',
                'contact_no' => '00000000'
            ]
        ];


        foreach($arrays as $array) {
            Teacher::create([
                'first_name' => $array['first_name'],
                'last_name' => $array['last_name'],
                'email' => $array['email'],
                'contact_no' => $array['contact_no']
            ]);
        }
    }
}
