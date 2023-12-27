<?php

namespace Database\Factories;

use App\Models\Influencer;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Influencer>
 */
class InfluencerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Influencer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $genders = ['male', 'female', 'other'];


    public function definition()
    {
        $inf = array_rand($this->genders, 1);

        return [
            'email' => $this->faker->email,
            'password' => Hash::make('influencer@123#'),
            'mobile_no' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'influencer_tier' => rand(1, 5),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->genders[$inf],
            'dob' => $this->faker->date,
            'tag' => Tag::all()->random()->id,
            'profile_image' => $this->faker->imageUrl,
            'status' => rand(1,4),
            'updated_by' => 1,
        ];
    }
}
