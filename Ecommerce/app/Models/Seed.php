<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Seed extends Model
{
    use HasFactory;

    public static function seeding($data)
    {
        foreach ($data as $category => $subcategories)
        {
            $category_id = Category::create([
                'name' => $category,
                'slug' => Str::slug($category, '-'),
                'icon' => $subcategories['icon']
            ])->id;

            foreach ($subcategories['subcategories'] as $subcategory => $attributes) {
                $subcategory_id = Subcategory::create([
                    'category_id' => $category_id,
                    'name' => $subcategory,
                    'slug' => Str::slug($subcategory, '-'),
                    'icon' => $attributes['icon']
                ])->id;

                foreach ($attributes['attributes'] as $attribute => $values) {
                    foreach ($values as $value) {
                        Attribute::create([
                            'subcategory_id' => $subcategory_id,
                            'name' => $attribute,
                            'value' => $value
                        ]);
                    }
                }
            }
        }
    }
}
