<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductStorePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storesCount = Store::count();

        // Populate the pivot table
        Product::all()->each(function ($product) {
            $product->stores()->attach(
                Store::all()->random(rand(1, 10))->pluck('id')->toArray()
            );
        });
    }
}
