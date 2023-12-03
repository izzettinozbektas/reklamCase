<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('advertisings')->insert([
            [
                'id'            => 1,
                'name'          => 'Test Reklam',
                'description'   => 'Lorem ipsum test',
                'start_date'    => Carbon::now()->format('Y.m.d'),
                'end_date'      => Carbon::now()->addWeek(1)->format('Y.m.d'),
                'created_at'    => Carbon::now()->format('Y.m.d')
            ],
            [
                'id'            => 2,
                'name'          => 'Test Reklam 1',
                'description'   => 'Lorem deneme test denme',
                'start_date'    => Carbon::now()->format('Y.m.d'),
                'end_date'      => Carbon::now()->addDay(4)->format('Y.m.d'),
                'created_at'    => Carbon::now()->format('Y.m.d')
            ],
            [
                'id'            => 3,
                'name'          => 'Test Reklam 2',
                'description'   => 'Lorem test 1234',
                'start_date'    => Carbon::now()->format('Y.m.d'),
                'end_date'      => Carbon::now()->addWeek(3)->format('Y.m.d'),
                'created_at'    => Carbon::now()->format('Y.m.d')
            ],
            [
                'id'            => 4,
                'name'          => 'Test Reklam 3',
                'description'   => 'Lorem test Lorem test Lorem test',
                'start_date'    => Carbon::now()->format('Y.m.d'),
                'end_date'      => Carbon::now()->addWeek(2)->format('Y.m.d'),
                'created_at'    => Carbon::now()->format('Y.m.d')
            ],
            [
                'id'            => 5,
                'name'          => 'Test Reklam 4',
                'description'   => 'Lorem test Lorem test Lorem test Lorem test Lorem test Lorem test',
                'start_date'    => Carbon::now()->format('Y.m.d'),
                'end_date'      => Carbon::now()->addDay(2)->format('Y.m.d'),
                'created_at'    => Carbon::now()->format('Y.m.d')
            ]
        ]);
    }
}
