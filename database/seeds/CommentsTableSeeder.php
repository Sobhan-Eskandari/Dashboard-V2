<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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

        foreach (range(1, 100) as $index){
            $comments[] = [
                'full_name' => $faker->name,
                'user_id' => rand(1, 10),
                'post_id' => rand(1, 50),
                'parent_id' => rand(1, 5),
                'subject' => $faker->firstName,
                'message' => $faker->realText(300),
                'tracking_code' => \Faker\Provider\Uuid::uuid(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];
        }

        DB::table('comments')->insert($comments);
    }
}
