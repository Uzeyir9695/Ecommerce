<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Seed;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HouseholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $energy_efficiency = ['A', 'B', 'A+', 'A++', 'A+++'];
        $color = ['White', 'Black', 'Black&White', 'Grey'];
        $number_of_programs = ['Less than 5', '5-10', 'More than 10'];

        $data = [
            'Household Appliances' => [
                'icon' => 'images/home.png',
                'subcategories' => [
                    'Washing Machines' => [
                        'icon' => 'images/washer.jpg',
                        'attributes' => [
                            'Brand'  => ['SAMSUNG', 'BEKO', 'VESTEL', 'BOSCH', 'LG', 'PANASONIC', 'TCL', 'ELECTROLUX', 'HISENSE', 'HOTPOINT', 'INDESIT', 'MIDEA', 'HOTPOINT-ARTISON'],
                            'Type' => ['Top Load', 'Front Load', 'Washer-Dryer'],
                            'Color' => ['White', 'Black', 'Red', 'Blue', 'Grey', 'Black&White'],
                            'Maximum Load' => ['4Kg', '5Kg', '6Kg', '7Kg', '8Kg', '9Kg', 'More than 9Kg'],
                            'Torque Speed (r/min)' => ['400-1000', '1000-1500', 'More than 1500'],
                            'Washing Class' => ['A', 'A+++', 'B', 'C'],
                            'Squeeze Class' => ['A', 'B', 'C', 'D'],
                            'Energy Efficiency Class' => $energy_efficiency
                        ],
                    ],
                    'Fridges' => [
                        'icon' => 'images/fridge.jpeg',
                        'attributes' => [
                            'Brand'  => ['SAMSUNG', 'BEKO', 'VESTEL', 'BOSCH', 'LG', 'PANASONIC', 'BLOMBERG', 'ELECTROLUX', 'HISENSE', 'SHARP', 'INDESIT', 'MIDEA', 'HOTPOINT-ARTISON', 'SATURN', 'NEUBERG'],
                            'Type' => ['Single Door', 'Two Doors', 'Three Doors', 'Four Doors', 'Side-by-Side'],
                            'Color' => ['White', 'Black', 'Black&White', 'Red', 'Golden', 'Grey', 'Cream'],
                            'Energy Efficiency Class' => $energy_efficiency,
                            'Total Capacity' => ['Less than 100L', '100-200L', '200-300L', '300-400L', '400-500L', 'More than 500L'],
                            'Freezer Capacity' => ['Less than 60L', '60-100L', '100-150L', 'More than 150L'],
                            'Defrost System' => ['Low Frost', 'No Frost', 'Twin Cooling', 'Automatic', 'Drip', 'Combined', 'Mechanical']
                        ]
                    ],
                    'Dishwashers' => [
                        'icon' => 'images/dishwasher.jpg',
                        'attributes' => [
                            'Brand'  => ['BEKO', 'VESTEL', 'BOSCH', 'LG', 'ELECTROLUX', 'INDESIT', 'HOTPOINT-ARTISON', 'BOSCH', 'HANSA'],
                            'Type' => ['Built-in'],
                            'Color' => $color,
                            'Energy Efficiency Class' => $energy_efficiency,
                            'Number of Programs' => $number_of_programs,
                            'Capacity' => ['Less than 10', 'More than 10']
                        ]
                    ],
                    'Ovens' => [
                        'icon' => 'images/oven.jpg',
                        'attributes' => [
                            'Brand'  => ['SAMSUNG', 'BEKO', 'VESTEL', 'BOSCH', 'WHIRLPOOL', 'BLOMBERG', 'ELECTROLUX', 'INDESIT', 'HANSA', 'HOTPOINT-ARTISON', 'BERTAZZONI', 'NEUBERG'],
                            'Type' => ['Gas', 'Electronic'],
                            'Color' => $color,
                            'Number of Programs' => $number_of_programs,
                            'Control' => ['Mechanical', 'Electrical', 'Touchscreen']
                        ]
                    ],
                    'Vacuum Cleaners' => [
                        'icon' => 'images/vacuum.jpg',
                        'attributes' => [
                            'Brand' => ['SAMSUNG', 'BEKO', 'VESTEL', 'BOSCH', 'LG', 'PANASONIC', 'VITEK', 'ELECTROLUX', 'PHILIPS', 'FAKIR', 'REMONDO', 'MIDEA', 'FRANKO', 'KARCHER', 'BLACK&DECKER'],
                            'Type'  => ['Bagged', 'Bagless', 'For a Vehicle', 'Steam'],
                            'Color' => ['Black', 'White', 'Black&White', 'Purple', 'Yellow', 'Red', 'Grey', 'Brown', 'Golden', 'Cream'],
                            'Power (W)' => ['Less than 1500', '1500-2000', 'More than 2000']
                        ]
                    ],
                ],
            ],
        ];


        Seed::seeding($data);
    }
}
