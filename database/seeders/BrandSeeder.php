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
        Brand::create(['name' => 'Samsung']);
        Brand::create(['name' => 'Apple']);
        Brand::create(['name' => 'Huawei']);
        Brand::create(['name' => 'Sony']);
        Brand::create(['name' => 'Oppo']);
        Brand::create(['name' => 'Xiaomi']);
        Brand::create(['name' => 'Poco']);
        Brand::create(['name' => 'One plus']);

    }
}
