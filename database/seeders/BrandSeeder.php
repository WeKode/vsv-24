<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(['name' => 'Samsung', 'type' => 1]);
        Brand::create(['name' => 'Apple', 'type' => 1]);
        Brand::create(['name' => 'Huawei', 'type' => 1]);
        Brand::create(['name' => 'Sony', 'type' => 1]);
        Brand::create(['name' => 'Oppo', 'type' => 1]);
        Brand::create(['name' => 'Xiaomi', 'type' => 1]);
        Brand::create(['name' => 'Poco', 'type' => 1]);
        Brand::create(['name' => 'One plus', 'type' => 1]);

    }
}
