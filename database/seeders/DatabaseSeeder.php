<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Category::factory(300)->create();
        \App\Models\Book::factory(1500)->create();

        $this->call([
            BookCategorySeeder::class
        ]);
    }
}
