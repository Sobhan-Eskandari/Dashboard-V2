<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $faker = Faker::create('fa_IR');
        foreach (range(1,50) as $index) {
            User::create([
                'user_name'=>$faker->unique()->userName,
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'email'=>$faker->email,
                'password'=>bcrypt('password'),
                'created_by'=>'1'
            ]);
        }
    }
}
