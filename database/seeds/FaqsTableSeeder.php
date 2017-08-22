<?php

use App\FAQ;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('f_a_q_s')->truncate();
        $faker = Faker::create('fa_IR');
        foreach (range(1,10) as $index){
            FAQ::create([
                'question'=>$faker->realText(150),
                'answer'=>$faker->realText(500),
                'created_by'=>'1'
            ]);
        }
    }
}
