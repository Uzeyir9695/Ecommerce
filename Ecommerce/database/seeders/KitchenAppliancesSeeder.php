<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Seed;
use Illuminate\Database\Seeder;

class KitchenAppliancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = ['White', 'Black', 'Black&White', 'Red', 'Grey', 'Cream'];
        $capacity = ['Less than 1L', '1L-2L', 'More than 2L'];

        $data = [
            'Kitchen Appliances' => [
                'icon' => 'images/pot.png',
                'subcategories' => [
                    'Microwaves' => [
                        'icon' => 'images/microwave.jpg',
                        'attributes' => [
                            'Brand'  => ['SAMSUNG', 'BEKO', 'WHIRLPOOL', 'NIKAI', 'VOX', 'PANASONIC', 'NIKURA', 'FRANKO'],
                            'Type' => ['Built-in'],
                            'Color' => ['Black', 'White'],
                            'Capacity' => ['Less than 20L', '20L-30L', 'More than 30L'],
                            'Control' => ['Mechanical', 'Electrical', 'More than 1500'],
                            'Oven Type' => ['Standard', 'Grill', 'Convection']
                        ]
                    ],
                    'Toaster Ovens' => [
                        'icon' => 'images/toaster.jpg',
                        'attributes' => [
                            'Brand'  => ['NIKAI', 'BEKO', 'SATURN', 'FRANKO'],
                            'Color' => $color,
                            'Power (W)' => ['Less than 1000', 'More than 1000'],
                            'Capacity' => ['25L-45L', '45L and more']
                        ]
                    ],
                    'Coffee Makers' => [
                        'icon' => 'images/coffee.jpeg',
                        'attributes' => [
                            'Brand'  => ['BEKO', 'PHILIPS', 'VITEK', 'MAXWELL', 'REDMOND', 'SATURN', 'KING', 'DIAMOND', 'FRANKO', 'BRAUN'],
                            'Type' => ['Espresso', 'With Filter'],
                            'Color' => ['White', 'Black', 'Black&White', 'Red', 'Grey', 'Brown'],
                            'Capacity' => $capacity,
                            'Coffee Use' => ['Grinded', 'Capsules', 'Beans', 'Pressed Coffee Filter (French Press)']
                        ]
                    ],
                    'Meat Grinders' => [
                        'icon' => 'images/meatgrinder.jpeg',
                        'attributes' => [
                            'Brand'  => ['SAMSUNG', 'BEKO', 'VESTEL', 'BOSCH', 'WHIRLPOOL', 'LG', 'ELECTROLUX', 'KING', 'BRAUN', 'NIKAI', 'BERTAZZONI', 'HOTPOINT'],
                            'Type' => ['Electronic', 'Mechanical', 'Multi Cutter'],
                            'Color' => ['Black', 'White', 'Black&White', 'Blue', 'Grey'],
                            'Power (W)' => ['Less than 1000', '1000-1500', 'More than 1500'],
                            'Productivity' => ['Less than 1Kg/min', '1Kg/min-3Kg/min', 'More than 3Kg/min']
                        ]
                    ],
                    'Juicers' => [
                        'icon' => 'images/juicer.jpeg',
                        'attributes' => [
                            'Brand' => ['SAMSUNG', 'BEKO', 'VESTEL', 'BRAUN', 'NIKAI', 'PANASONIC', 'VITEK', 'ELECTROLUX', 'PHILIPS', 'KING', 'MAXWELL', 'KENWOOD', 'FRANKO', 'VOX', 'ZANUSSI'],
                            'Color' => $color,
                            'Power (W)' => ['Less than 1000', 'More than 1000'],
                            'Capacity' => $capacity,
                            'Number of Speeds' => ['1', '2', '3 and more']
                        ]
                    ],
                    'Blenders' => [
                       'icon' => 'images/blender.jpg',
                        'attributes' => [
                            'Brand' => ['SAMSUNG', 'BEKO', 'VESTEL', 'BRAUN', 'NIKAI', 'PANASONIC', 'VITEK', 'ELECTROLUX', 'PHILIPS', 'KING', 'MAXWELL', 'HITT', 'FRANKO', 'VOX', 'ARZUM'],
                            'Type'  => ['Stationary', 'Manual'],
                            'Color' => ['Black', 'White', 'Black&White', 'Purple', 'Red', 'Grey', 'Pink', 'BLue', 'Cream'],
                            'Power (W)' => ['Less than 1500', '500-1000', 'More than 1000'],
                            'Connection' => ['Wired', 'Wireless'],
                            'Capacity' => ['Less than 1L', '1L-2L', 'Without Bowl']
                        ]
                    ],
                    'Tea Kettles' => [
                        'icon' => 'images/teakettle.jpg',
                        'attributes' => [
                            'Brand' => ['SENCOR', 'BEKO', 'SUNNY', 'BRAUN', 'SHARP', 'PANASONIC', 'VITEK', 'ELECTROLUX', 'PHILIPS', 'KING', 'MAXWELL', 'KENWOOD', 'FRANKO', 'VOX', 'ACME'],
                            'Type'  => ['Electric', 'Non Electric'],
                            'Power (W)' => ['Less than 1000', '1000-1500', '1500-2000', 'More than 2000'],
                            'Capacity' => $capacity
                        ]
                    ]
                ]
            ],
        ];

        Seed::seeding($data);
    }
}
