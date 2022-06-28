<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Seed;
use Illuminate\Database\Seeder;

class WomenClothingSeeder extends Seeder
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
        $dresses_length = ['Knee-Length', 'Ankle-Length', 'Floor-Length', 'Above Knee, Mini', 'Mid-Calf'];
        $decoration = ['Sashes', 'Pockets', 'Bow', 'Lace', 'Button'];
        $pattern_type = ['Dotted', 'Stripped', 'Print', 'Animal', 'Solid', 'Geometric', 'Leopard', 'Cartoon', 'Letter'];

        $data = [
            'Clothing for women' => [
                'icon' => 'images/woman.png',
                'subcategories' => [
                    'Dresses' => [
                        'icon' => 'images/dress.jpg',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Material' => $material,
                            'Dresses Length' => $dresses_length,
                            'Neckline' => ['Peter pan Collar', 'Hooded', 'STAND', 'V-Neck', 'Turtleneck', 'Notched', 'Bow', 'Square Collar', 'Slash neck', 'Turn-down Collar'],
                            'Style' => ['Bohemian', 'Club', 'Preppy Style', 'Vintage'],
                            'Decoration' => $decoration,
                            'Pattern Type' => $pattern_type,
                        ]
                    ],
                    'Skirts' => [
                        'icon' => 'images/skirt.jpg',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Material' => $material,
                            'Dresses Length' => $dresses_length,
                            'Decoration' => $decoration,
                            'Pattern Type' => $pattern_type,
                            'Style' => ['Casual', 'Formal'],
                        ]
                    ],
                    'Jackets & Coats for women' => [
                        'icon' => 'images/womencoat.jpg',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Material' => $material,
                            'Clothing Length' => ['Long', 'Short', 'X-Long', 'Regular']
                        ]
                    ],
                    'Pullovers' => [
                        'icon' => 'images/pullover.png',
                        'attributes' => [
                            'Size'  => $size,
                            'Color' => $color,
                            'Clothing Length' => ['Long', 'Short', 'Regular'],
                            'Material' => $material,
                            'Pattern Type' => $pattern_type
                        ]
                    ],
                ],
            ],
        ];

        Seed::seeding($data);
    }
}
