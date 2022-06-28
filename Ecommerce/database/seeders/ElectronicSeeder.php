<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Seed;
use Illuminate\Database\Seeder;

class ElectronicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = ['Black', 'White', 'Red', 'Grey', 'Golden', 'Cream'];


        $computer_laptop_attributes = [
            'icon' => 'images/computer.jpg',
            'attributes' => [
                'Brand'  => ['Lenovo', 'HP', 'ACER', 'ASUS', 'DELL', 'MSI', 'TOSHIBA'],
                'Color' => $color,
                'Diagonal' => ['Less than 11', '11-15', 'More than 15'],
                'Resolution' => ['HD', '1600X900', 'Full HD', '2304X1440', '2560X1440', '2560X1600', '3200X1800', 'Ultra HD'],
                'Operating System' => ['Linux', 'Mac OS', 'Windows 7', 'Windows 8', 'Windows 10', 'Windows 11', 'Without Operating System'],
                'Core' => ['2', '4', '6', '8'],
                'RAM' => ['2GB', '4GB', '6GB', '8GB', '12GB', '16GB', '32GB', 'More than 32GB'],
                'Processor' => ['Intel Core I3', 'Intel Core I5', 'Intel Core I7', 'Intel Core M', 'Intel Pentium', 'Intel Celeron', 'Intel Atom', 'AMD A8', 'AMD A10', 'AMD A12'],
                'Hard Drive Type' => ['HDD', 'SSD', 'HDD+SSD', 'HDD+SSD Cache'],
                'Hard Disk Size' => ['Less than 160GB', '160GB-320GB', '320GB-500GB', '500GB-750GB', '1TB', '2TB'],
                'CPU Frequency' => ['Less than 1.5GHz', '1.5GHz-3GHz', 'More than 3GHz'],
                'Graphics Card' => ['Intel', 'NVIDIA', 'AMD'],
                'Graphics Card Type' => ['Discrete', 'Integrated'],
                'Graphics Card Memory Size' => ['1GB', '2GB', 'More than 2GB']
            ]
        ];

        $data = [
            'Electronics'=> [
                'icon' => 'images/electronic.png',
                'subcategories' => [
                    'Apple' => [
                        'icon' => 'images/apple.jpg',
                        'attributes' => [
                            'Type'  => ['Mac', 'IPad', 'Iphone', 'Watch'],
                            'Color' => $color
                        ],
                    ],
                    'Laptops' => $computer_laptop_attributes,

                    'Computers' => $computer_laptop_attributes,

                    'Monitors' => [
                        'icon' => 'images/monitor.jpg',
                        'attributes' => [
                            'Brand'  => ['SAMSUNG', 'LG', 'PHILIPS', 'LENOVO', 'HP', 'ACER', 'ASUS', 'DELL', 'MSI'],
                            'Color' => ['Black', 'White', 'Grey'],
                            'Diagonal' => ['Less than 18', '18-20', 'More than 20'],
                            'Resolution' => ['1280X1024', 'HD', '1440X900', '1600X900', 'Full HD', '1920-1200', '2560-1080'],
                            'Ports' => ['Display Port', 'Mini Display Port', 'DVI', 'HDMI', 'VGA']
                        ]
                    ],
                    'TVs' => [
                        'icon' => 'images/tv.jpg',
                        'attributes' => [
                            'Brand'  => ['SAMSUNG', 'LG', 'PHILIPS', 'SONY', 'PANASONIC', 'TCL', 'NIKAI', 'GRUNDIG', 'HAIER', 'HISENSE', 'SHARP', 'VOX', 'BRAVIS', 'KLIDGE', 'SUNNY', 'TOSHIBA', 'NEOS'],
                            'Color' => ['Black', 'Grey', 'Golden'],
                            'Diagonal' => ['Less than 32"', '33"-43"', '44"-49"', '50"-59"', '60"-69"', '70"-85"'],
                            'Resolution' => ['HD', 'Full HD', 'Ultra HD', '4k Ultra HD', 'Retlna', 'Liquid Reltna'],
                            'Class' => ['LCD', 'LED', 'Plasma', 'QLED', 'OLED'],
                            'Design' => ['Curved'],
                            'Additional Features' => ['Smart TV', '3D']
                        ]
                    ],
                    'Smartphones' => [
                        'icon' => 'images/smartphone.jpg',
                        'attributes' => [
                            'Brand'  => ['SAMSUNG', 'LG', 'HUAWEI', 'SONY', 'LENOVO', 'FLY', 'NOKIA', 'XIAOMI', 'HONOR'],
                            'Color' => $color,
                            'Diagonal' => ['Less than 3"', '4"-5"', '5"-6"', 'More than 6"'],
                            'Resolution' => ['1440X720', '1480X720', '1792X828', 'Full HD', '2160X1080', '2220X1080', '2240X1080', '2244X1080', '2246X1080', '2248X1080', '2280X1080', '2340X1080', '2436X1125'],
                            'Operating System' => ['IOS', 'Android'],
                            'Core' => ['1', '2', '4', '6', '8', '10'],
                            'RAM' => ['2GB', '3GB', '4GB', '6GB', '8GB', '16GB'],
                            'CPU Frequency' => ['1GHz-2GHz', '3GHz', 'More than 3GHz'],
                            'Internal Memory' => ['Less than 4GB', '4GB', '8GB', '16GB', '32GB', '64GB', 'More than 64GB'],
                            'Number of SIM Cards' => ['1', '2'],
                            'SIM Card Type' => ['Mini', 'Micro', 'Nano']
                        ]
                    ],
                    'Headphones' => [
                        'icon' => 'images/headphone.jpg',
                        'attributes' => [
                            'Brand'  => ['APPLE', 'ACME', 'BEATS', 'JBL', 'BOSE', 'MARSHALL', 'HYPER X', 'DEFENDER', 'REDRAGON'],
                            'Color' => $color,
                            'Connection' => ['Bluetooth', 'Cabel']
                        ]
                    ],
                    'Accessories' => [
                        'icon' => 'images/accessories.png',
                        'attributes' => [
                            'Brand'  => ['ACER', 'ASUS', 'DELL', 'HP', 'LOGILINK', 'XIAOMI', 'DEFENDER', 'REDRAGON', 'TP-LINK', 'TENDA'],
                            'Type' => ['Keyboards', 'Mice', 'Mouse Pads', 'Laptop Bags', 'Webcams', 'Accessories&Adapters', 'Joystickes', 'Routers', 'Car Camcorder'],
                        ]
                    ],
                ],
            ],
        ];

        Seed::seeding($data);

    }
}
