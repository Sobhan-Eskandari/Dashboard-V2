<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class FriendsTableSeeder extends Seeder
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

        foreach (range(1, 20) as $index){
            $friends[] = [
                'site_name' => $faker->domainName,
                'address' => $faker->url,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => '1',
            ];
        }

        DB::table('friends')->insert($friends);
    }
}
