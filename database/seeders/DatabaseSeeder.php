<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'e

        $this->call([
            TeacherSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            SupplierSeeder::class,
            DepartmentSeeder::class,
            UserGroupSeeder::class,
            EmployeeSeeder::class,
            ItemSeeder::class,
            AccountabilitySeeder::class,
            StockSeeder::class,
        ]);
    }
}
