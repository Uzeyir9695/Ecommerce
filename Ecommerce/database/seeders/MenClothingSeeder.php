<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Seed;
use Illuminate\Database\Seeder;

class MenClothingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = ['Silver', 'Black', 'Orange', 'Blue', 'Grey', 'whhite'];
        $size = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', '4XL', '5XL'];
        $material = ['Cotton', 'Bamboo Fiber', 'Polyester', 'Acetate', 'Spandex', 'Silk', 'Wool', 'Linen', 'Acrylic'];

        $data = [
            'Clothing for men' => [
                'icon' => 'images/man.svg',
                'subcategories' => [
                    'Jeans' => [
                        'icon' => 'images/jeans.jpg',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Wash' => ['Medium', 'Light', 'Stonewashed', 'DARK', 'Colored'],
                            'Fit Type' => ['LOOSE', 'Skinny', 'Straight', 'Regular'],
                            'Waist Type' => ['High', 'Mid', 'Low'],
                            'Thickness' => ['Heavyweight', 'Midweight', 'Fleece'],
                            'Material' => ['Cotton', 'Bamboo Fiber', 'Polyester', 'Acetate', 'Spandex']
                        ]
                    ],
                    'Shirts' => [
                        'icon' => 'images/shirt.png',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Material' => $material,
                        ]
                    ],
                    'Jackets & Coats for men' => [
                        'icon' => 'images/coat.jpg',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Material' => $material,
                            'Clothing Length' => ['Long', 'Short', 'X-Long', 'Regular']
                        ]
                    ],
                    'Board Shorts' => [
                        'icon' => 'images/boardshort.png',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Material' => $material,
                            'Pattern Type' => ['Dotted', 'Stripped', 'Print', 'Animal', 'Solid', 'Geometric', 'Leopard', 'Cartoon', 'Letter']
                        ]
                    ],
                    'Underwear for men' => [
                        'icon' => 'images/underwear.jpeg',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Material' => $material,
                        ]
                    ],
                ],
            ],
        ];

        Seed::seeding($data);
    }
}
