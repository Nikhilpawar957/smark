<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('enquiries')->insert([
                'full_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'mobile_no' => $faker->phoneNumber,
                'organization' => $faker->company,
                'query' => $faker->text(100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
