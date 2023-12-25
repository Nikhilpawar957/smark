<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_no'=> $this->faker->unique()->phoneNumber(),
            'username' => $this->faker->unique()->userName(),
            'password' => Hash::make('admin@123#'),
            'first_name' => $this->faker->unique()->firstName(),
            'last_name' => $this->faker->unique()->lastName(),
            'role' => Role::all()->random()->id,
            'status' => rand(0,1),
            'created_by' => 1,
        ];
    }
}
