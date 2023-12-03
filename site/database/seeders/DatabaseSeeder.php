<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RelationSeeder::class,
            AdvertisingSeeder::class,
            PlatformSeeder::class
        ]);
       \App\Models\PlatformTransaction::factory(100)->create();



       //\App\Models\User::factory(1)->create();
        //\App\Models\Product::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
