<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'campaign_type' => rand(1, 3),
            'campaign_name' => $this->faker->unique()->name,
            'offer_type' => rand(0, 1),
            'brand_id' => Brand::all()->random()->id,
            'tag_id' => Tag::all()->random()->id,
            'end_date' => date('Y-m-d',strtotime(rand(1,12).' months '.rand(1,28).' days')),
            'status' => rand(1, 4),
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
