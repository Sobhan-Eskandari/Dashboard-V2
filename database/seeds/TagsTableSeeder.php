<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();

        $faker = Faker::create("fa_IR");
        $tags = [];

        foreach (range(1, 50) as $index){
            $tags[] = [
                'name' => $faker->unique()->firstName,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => '1',
            ];
        }

        DB::table('tags')->insert($tags);
    }
}
