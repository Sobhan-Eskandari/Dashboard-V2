<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Facades\jDate;
use Faker\Factory as Faker;

class InboxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inboxes')->truncate();

        $faker = Faker::create("fa_IR");
        $inboxes = [];
        $time = jDate::forge('now')->format('datetime', true);

        foreach (range(1, 100) as $index){
            $inboxes[] = [
                'full_name' => $faker->name,
                'email' => $faker->email,
                'subject' => $faker->firstName,
                'message' => $faker->realText(300),
                'tracking_code' => \Faker\Provider\Uuid::uuid(),
                'created_at' => $time,
                'updated_at' => $time,
            ];
        }

        DB::table('inboxes')->insert($inboxes);
    }
}
