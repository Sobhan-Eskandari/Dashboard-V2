<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        $faker = Faker::create("fa_IR");
        $posts = [];
        $time = jDate::forge('now')->format('datetime', true);

        foreach (range(1, 50) as $index){
            $post = new Post([
                'title' => $faker->firstName,
                'body' => $faker->realText(500),
                'created_at' => $time,
                'updated_at' => $time,
                'created_by' => '1',
                'updated_by' => '2',
            ]);
            $post->save();
        }

//        DB::table('posts')->insert($posts);
    }
}
