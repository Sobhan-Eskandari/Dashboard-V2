<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OutboxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outboxes')->truncate();

        $faker = Faker::create("fa_IR");
        $outboxes = [];

        foreach (range(1, 100) as $index){
            $outboxes[] = [
                'inbox_id'=>rand(1,30),
                'subject' => $faker->firstName,
                'message' => $faker->realText(300),
                'created_by' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];
        }

        DB::table('outboxes')->insert($outboxes);
    }
}
