<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Influencer;
use App\Models\Brand;
use App\Models\Slugs;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SlugsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slugs::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => Str::random(8),
            'campaign_id' => Campaign::all()->random()->id,
            'influencer_id' => Influencer::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'slug_url' => $this->faker->url(),
            'status' => rand(0,1),
            'updated_by' => 1,
        ];
    }
}
