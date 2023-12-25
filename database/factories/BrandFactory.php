<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_logo' => $this->faker->imageUrl,
            'email' => $this->faker->email,
            'password' => Hash::make('brand@123#'),
            'company_name' => $this->faker->company,
            'director_name' => $this->faker->name,
            'mobile_no' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'updated_by' => 1,
        ];
    }
}
