<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Brand::create([
            'name' => 'Apple',
            'slug' => 'apple'
        ]);

        Brand::create([
            'name' => 'Xiaomi',
            'slug' => 'xiaomi'
        ]);

        Brand::create([
            'name' => 'Samsung',
            'slug' => 'samsung'
        ]);

        Brand::create([
            'name' => 'Oppo',
            'slug' => 'oppo'
        ]);

        Brand::create([
            'name' => 'Vivo',
            'slug' => 'vivo'
        ]);

        Brand::create([
            'name' => 'Realme',
            'slug' => 'realme'
        ]);

        Brand::create([
            'name' => 'Asus',
            'slug' => 'asus'
        ]);

        Brand::create([
            'name' => 'Huawei',
            'slug' => 'huawei'
        ]);

        Brand::create([
            'name' => 'Sony',
            'slug' => 'sony'
        ]);

        Brand::create([
            'name' => 'Nokia',
            'slug' => 'nokia'
        ]);

        Brand::create([
            'name' => 'Lenovo',
            'slug' => 'lenovo'
        ]);

        Brand::create([
            'name' => 'OnePlus',
            'slug' => 'oneplus'
        ]);

        Brand::create([
            'name' => 'ZTE',
            'slug' => 'zte'
        ]);

        Brand::create([
            'name' => 'LG',
            'slug' => 'lg'
        ]);

        Brand::create([
            'name' => 'HTC',
            'slug' => 'htc'
        ]);

        Brand::create([
            'name' => 'Meizu',
            'slug' => 'meizu'
        ]);
    }
}
