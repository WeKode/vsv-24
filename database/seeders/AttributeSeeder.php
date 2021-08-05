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
        Attribute::create(['name' => 'Ram', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '1 Go']),
            new AttributeValue(['name' => '2 Go']),
            new AttributeValue(['name' => '4 Go']),
            new AttributeValue(['name' => '6 Go']),
            new AttributeValue(['name' => '8 Go']),
            new AttributeValue(['name' => '10 Go']),
        ]);

        Attribute::create(['name' => 'Frontal camera', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '4 MP to 7 MP']),
            new AttributeValue(['name' => '8 MP to 12 MP']),
            new AttributeValue(['name' => '13 MP to 20 MP']),
            new AttributeValue(['name' => 'over 20 MP']),
        ]);

        Attribute::create(['name' => 'Camera', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '4 MP to 7 MP']),
            new AttributeValue(['name' => '8 MP to 12 MP']),
            new AttributeValue(['name' => '13 MP to 20 MP']),
            new AttributeValue(['name' => 'over 20 MP']),
        ]);

        Attribute::create(['name' => 'Operation system', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Android']),
            new AttributeValue(['name' => 'IOS']),
        ]);

        Attribute::create(['name' => 'Dual sim', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Yes']),
            new AttributeValue(['name' => 'No']),
        ]);

        Attribute::create(['name' => 'Display', 'type' => 1, 'is_editable' => false]);
        Attribute::create(['name' => 'Resolution', 'type' => 1, 'is_editable' => false]);
        Attribute::create(['name' => 'Battery', 'type' => 1, 'is_editable' => false]);


    }
}
