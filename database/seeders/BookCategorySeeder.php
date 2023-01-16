<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::with('categories')->whereDoesntHave('categories')->lazyById(100)->each(function ($item) {
            $categories = Category::select('id')->inRandomOrder()->take(rand(1, 2))->pluck('id')->toArray();
            $item->categories()->sync($categories);
        });
    }
}
