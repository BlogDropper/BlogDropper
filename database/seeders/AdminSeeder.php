<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the categories data
        $categories = [
            ['name' => 'Lifestyle', 'description' => 'Category Lifestyle', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Events', 'description' => 'Category Events', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuisine & Restro', 'description' => 'Category Cuisine', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fashion', 'description' => 'Category Fashion', 'status' => 1,'created_at' => now(), 'updated_at' => now()],
        ];

        // Insert the categories into the database
        DB::table('categories')->insert($categories);

        DB::table('users')->insert([
            'name' => 'BlogDropper',
            'email' => 'blogdropper8@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Blogdropper8765'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
