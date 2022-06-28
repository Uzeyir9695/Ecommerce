<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = Store::factory()->count(50)->create();
        foreach($stores as $store){
            $store->addMedia(public_path('/seeder-media/store-cover.webp'))->preservingOriginal()->toMediaCollection('covers');
            $store->addMedia(public_path('/seeder-media/store-logo.jpg'))->preservingOriginal()->toMediaCollection('logos');
        }
    }
}
