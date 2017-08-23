<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $faker = Faker::create("fa_IR");
        $categories = [];
//        $time = jDate::forge('now')->format('datetime', true);

        foreach (range(1, 50) as $index){
            $categories[] = [
                'name' => $faker->unique()->firstName,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => '1',
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
