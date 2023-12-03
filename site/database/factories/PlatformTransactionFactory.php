<?php

namespace Database\Factories;

use App\Models\PlatformTransaction;
use App\Models\RelationModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlatformTransaction>
 */
class PlatformTransactionFactory extends Factory
{
    protected $model = PlatformTransaction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'platform_id' => rand(1,3),
            'clicks'      => rand(1,300),
            'spend'       => mt_rand (10*10, 50*10) / 10,
            'revenue'     => (mt_rand (10*10, 50*10) / 10) * 2,
            'impressions' => rand(10,500),
            'created_at'  => Carbon::now()->addDay(rand(1,30))->format('Y.m.d')
        ];
    }
}
