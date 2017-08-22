<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class FriendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->truncate();

        $faker = Faker::create("fa_IR");
        $friends = [];
        $time = jDate::forge('now')->format('datetime', true);

        foreach (range(1, 20) as $index){
            $friends[] = [
                'site_name' => $faker->domainName,
                'address' => $faker->url,
                'created_at' => $time,
                'updated_at' => $time,
                'created_by' => '1',
            ];
        }

        DB::table('friends')->insert($friends);
    }
}
