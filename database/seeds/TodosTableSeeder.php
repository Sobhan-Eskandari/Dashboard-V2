<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Morilog\Jalali\Facades\jDate;

class TodosTableSeeder extends Seeder
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

        foreach (range(1, 20) as $index){
            $todos[] = [
                'task' => $faker->realText(25),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'user_id' => '1',
            ];
        }

        DB::table('todos')->insert($todos);
    }
}
