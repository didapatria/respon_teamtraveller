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
            'name' => 'Adinda Fadhil Patria',
            'username' => 'didapatria',
            'email' => 'didapatria3@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        Brand::create([
            'name' => 'Apple',
            'slug' => 'apple',
            'image' => 'apple.svg'
        ]);

        Brand::create([
            'name' => 'Xiaomi',
            'slug' => 'xiaomi',
            'image' => 'xiaomi.svg'
        ]);

        Brand::create([
            'name' => 'Samsung',
            'slug' => 'samsung',
            'image' => 'samsung.svg'
        ]);

        Brand::create([
            'name' => 'Oppo',
            'slug' => 'oppo',
            'image' => 'oppo.svg'
        ]);

        Brand::create([
            'name' => 'Vivo',
            'slug' => 'vivo',
            'image' => 'vivo.svg'
        ]);

        Brand::create([
            'name' => 'Realme',
            'slug' => 'realme',
            'image' => 'realme.svg'
        ]);

        Brand::create([
            'name' => 'Asus',
            'slug' => 'asus',
            'image' => 'asus.svg'
        ]);

        Brand::create([
            'name' => 'Huawei',
            'slug' => 'huawei',
            'image' => 'huawei.svg'
        ]);

        Brand::create([
            'name' => 'Sony',
            'slug' => 'sony',
            'image' => 'sony.svg'
        ]);

        Brand::create([
            'name' => 'Nokia',
            'slug' => 'nokia',
            'image' => 'nokia.svg'
        ]);

        Brand::create([
            'name' => 'Lenovo',
            'slug' => 'lenovo',
            'image' => 'lenovo.svg'
        ]);

        Brand::create([
            'name' => 'OnePlus',
            'slug' => 'oneplus',
            'image' => 'oneplus.svg'
        ]);

        Brand::create([
            'name' => 'ZTE',
            'slug' => 'zte',
            'image' => 'zte.svg'
        ]);

        Brand::create([
            'name' => 'LG',
            'slug' => 'lg',
            'image' => 'lg.svg'
        ]);

        Brand::create([
            'name' => 'HTC',
            'slug' => 'htc',
            'image' => 'htc.svg'
        ]);

        Brand::create([
            'name' => 'Meizu',
            'slug' => 'meizu',
            'image' => 'meizu.svg'
        ]);
    }
}
