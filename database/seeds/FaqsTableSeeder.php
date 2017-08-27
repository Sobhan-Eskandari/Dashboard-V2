<?php

use App\FAQ;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->truncate();
        $faker = Faker::create('fa_IR');
        foreach (range(1,10) as $index){
            Faq::create([
                'question'=>$faker->realText(150),
                'answer'=>$faker->realText(500),
                'created_by'=>'1'
            ]);
        }
    }
}
