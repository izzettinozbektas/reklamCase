<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('advertising_to_platform')->insert([
            ['advertising_id' => 1,'platform_id' => 1],
            ['advertising_id' => 2,'platform_id' => 1],
            ['advertising_id' => 3,'platform_id' => 1],
            ['advertising_id' => 4,'platform_id' => 1],
            ['advertising_id' => 5,'platform_id' => 1],
            ['advertising_id' => 5,'platform_id' => 2],
            ['advertising_id' => 4,'platform_id' => 2],
            ['advertising_id' => 3,'platform_id' => 2],
            ['advertising_id' => 2,'platform_id' => 2],
            ['advertising_id' => 1,'platform_id' => 2],
            ['advertising_id' => 1,'platform_id' => 3],
            ['advertising_id' => 2,'platform_id' => 3],
            ['advertising_id' => 3,'platform_id' => 3],
            ['advertising_id' => 4,'platform_id' => 3],
            ['advertising_id' => 5,'platform_id' => 3],
        ]);
    }
}
