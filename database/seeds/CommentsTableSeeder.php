<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        $faker = Faker::create("fa_IR");
        $comments = [];
        $time = jDate::forge('now')->format('datetime', true);

        foreach (range(1, 100) as $index){
            $comments[] = [
                'full_name' => $faker->name,
                'user_id'=>rand(1,10),
                'post_id'=>rand(1,3),
                'parent_id'=>rand(1,5),
                'subject' => $faker->firstName,
                'message' => $faker->realText(300),
                'tracking_code' => \Faker\Provider\Uuid::uuid(),
                'created_at' => $time,
                'updated_at' => $time,
            ];
        }

        DB::table('comments')->insert($comments);
    }
}
