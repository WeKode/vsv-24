<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create(['name' => 'Ram'])->values()->saveMany([
            new AttributeValue(['name' => '1 Go']),
            new AttributeValue(['name' => '2 Go']),
            new AttributeValue(['name' => '4 Go']),
            new AttributeValue(['name' => '6 Go']),
            new AttributeValue(['name' => '8 Go']),
            new AttributeValue(['name' => '10 Go']),
        ]);

        Attribute::create(['name' => 'Frontal camera'])->values()->saveMany([
            new AttributeValue(['name' => '4 MP to 7 MP']),
            new AttributeValue(['name' => '8 MP to 12 MP']),
            new AttributeValue(['name' => '13 MP to 20 MP']),
            new AttributeValue(['name' => 'over 20 MP']),
        ]);

        Attribute::create(['name' => 'Rear Camera'])->values()->saveMany([
            new AttributeValue(['name' => '4 MP to 7 MP']),
            new AttributeValue(['name' => '8 MP to 12 MP']),
            new AttributeValue(['name' => '13 MP to 20 MP']),
            new AttributeValue(['name' => 'over 20 MP']),
        ]);

        Attribute::create(['name' => 'Operation system'])->values()->saveMany([
            new AttributeValue(['name' => 'Android']),
            new AttributeValue(['name' => 'IOS']),
        ]);

        Attribute::create(['name' => 'Dual sim'])->values()->saveMany([
            new AttributeValue(['name' => 'Yes']),
            new AttributeValue(['name' => 'No']),
        ]);;

    }
}
