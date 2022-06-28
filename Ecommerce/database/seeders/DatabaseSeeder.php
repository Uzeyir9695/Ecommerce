<?php

namespace Database\Seeders;

use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create();

        $this->call([
            HouseholdSeeder::class,
            ElectronicSeeder::class,
            KitchenAppliancesSeeder::class,
            MenClothingSeeder::class,
            WomenClothingSeeder::class,
            ProductTableSeeder::class,
            StoreTableSeeder::class,
            ProductStorePivotSeeder::class
        ]);
    }
}
