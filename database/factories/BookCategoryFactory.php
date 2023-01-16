<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => \App\Models\Book::select('id')->inRandomOrder()->first()->id,
            'category_id' => \App\Models\Category::select('id')->inRandomOrder()->first()->id,
        ];
    }
}
