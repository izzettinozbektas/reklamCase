<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // id elle verme sebebim seed ederken ilişki kurmak için
        DB::table('platforms')->insert([
            [
                'id'            => 1,
                'name'          => 'Facebook',
                'remainder'     => 5000,
                'created_at'    => Carbon::now()->format('Y.m.d')
            ],
            [
                'id'            => 2,
                'name'          => 'Instagram',
                'remainder'     => 5000,
                'created_at'    => Carbon::now()->format('Y.m.d')
            ],
            [
                'id'            => 3,
                'name'          => 'Tiktok',
                'remainder'     => 5000,
                'created_at'    => Carbon::now()->format('Y.m.d')
            ],
        ]);
    }
}
