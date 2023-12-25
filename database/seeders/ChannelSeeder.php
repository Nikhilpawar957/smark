<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('channels')->insert(
            [
                [
                    'channel_name' => 'Instagram',
                    'icon' => '/assets/src/img/instagram.svg',
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'channel_name' => 'Youtube',
                    'icon' => '/assets/src/img/youtube.svg',
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'channel_name' => 'Facebook',
                    'icon' => '/assets/src/img/facebook.svg',
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'channel_name' => 'Twitter',
                    'icon' => '/assets/src/img/twitter.svg',
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'channel_name' => 'Quora',
                    'icon' => '/assets/src/img/quora.svg',
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'channel_name' => 'Telegram',
                    'icon' => '/assets/src/img/telegram.svg',
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'channel_name' => 'Other',
                    'icon' => '/assets/src/img/link.svg',
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]
        );
    }
}
