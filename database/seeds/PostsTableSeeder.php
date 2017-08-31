<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class PostsTableSeeder extends Seeder
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

        foreach (range(1, 50) as $index){
            $post = new Post([
                'title' => $faker->firstName,
                'body' => $faker->realText(500),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'views' => rand(10, 100),
                'created_by' => '1',
                'updated_by' => '1',
            ]);

            $post->save();

            $post->categories()->attach([rand(1, 20), rand(21, 40), rand(41, 50)]);
            $post->tags()->attach([rand(1, 20), rand(21, 40), rand(41, 50)]);
        }

    }
}
