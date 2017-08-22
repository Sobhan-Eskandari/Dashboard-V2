<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->truncate();

        $faker = Faker::create("fa_IR");
        $todos = [];
        $time = jDate::forge('now')->format('datetime', true);

        foreach (range(1, 20) as $index){
            $todos[] = [
                'task' => $faker->realText(150),
                'created_at' => $time,
                'updated_at' => $time,
                'user_id' => '1',
            ];
        }

        DB::table('todos')->insert($todos);
    }
}
