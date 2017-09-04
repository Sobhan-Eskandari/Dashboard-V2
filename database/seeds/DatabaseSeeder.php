<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(FriendsTableSeeder::class);
        $this->call(InboxesTableSeeder::class);
        $this->call(OutboxesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TodosTableSeeder::class);
    }
}
