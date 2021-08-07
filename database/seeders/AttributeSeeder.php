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

        Attribute::create(['name' => 'Rom', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '64 Go']),
            new AttributeValue(['name' => '128 Go']),

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

        Attribute::create(['name' => 'Operating system', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Android']),
            new AttributeValue(['name' => 'IOS']),
        ]);

        Attribute::create(['name' => 'Sim card format', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Dual sim']),
        ]);

        Attribute::create(['name' => 'Bluetooth', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Yes']),
            new AttributeValue(['name' => 'No']),
        ]);

        Attribute::create(['name' => 'Colour', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Black']),
        ]);

        Attribute::create(['name' => 'Display', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '6.1 Inch']),
            new AttributeValue(['name' => '6.3 Inch']),
        ]);

        ;
        Attribute::create(['name' => 'Resolution', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '6.1 Inch']),
            new AttributeValue(['name' => '6.3 Inch']),
        ]);

        Attribute::create(['name' => 'Battery', 'type' => 1, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '2000']),
            new AttributeValue(['name' => '4000']),
        ]);


        Attribute::create(['name' => 'Data volume', 'type' => 2, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '50 Gb']),
        ]);

        Attribute::create(['name' => 'Sim card options', 'type' => 2, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Triple sim']),
            new AttributeValue(['name' => 'E-sim']),
        ]);

        Attribute::create(['name' => 'Number portability', 'type' => 2, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Yes']),
            new AttributeValue(['name' => 'No']),
        ]);

        Attribute::create(['name' => 'Tariff type', 'type' => 2, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'Contract']),
            new AttributeValue(['name' => 'Prepaid']),
        ]);

        Attribute::create(['name' => 'Data speed', 'type' => 2, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '21 mbps']),
            new AttributeValue(['name' => '50 mbps']),
            new AttributeValue(['name' => '100 mbps']),
            new AttributeValue(['name' => '200 mbps']),
            new AttributeValue(['name' => '300 mbps']),
        ]);

        Attribute::create(['name' => 'Contract duration', 'type' => 3, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '24 months']),
            new AttributeValue(['name' => '12 months']),
        ]);

        Attribute::create(['name' => 'Annual consumption', 'type' => 3, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '2500 kWh']),
            new AttributeValue(['name' => '3000 kWh']),
        ]);

        Attribute::create(['name' => 'Down payment', 'type' => 3, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => 'monthly']),
            new AttributeValue(['name' => 'yearly']),
        ]);

        Attribute::create(['name' => 'Renewal', 'type' => 3, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '12 months']),
            new AttributeValue(['name' => '24 months']),
        ]);

        Attribute::create(['name' => 'Notice period', 'type' => 3, 'is_editable' => false])->values()->saveMany([
            new AttributeValue(['name' => '6 weeks to the end of the contract']),
            new AttributeValue(['name' => '12 weeks to the end of the contract']),

        ]);

//        Attribute::create(['name' => 'Data', 'type' => 3, 'is_editable' => false])->values()->saveMany([
//            new AttributeValue(['name' => '21']),
//        ]);
//
//        Attribute::create(['name' => 'Data', 'type' => 3, 'is_editable' => false])->values()->saveMany([
//            new AttributeValue(['name' => '21']),
//        ]);

    }
}
