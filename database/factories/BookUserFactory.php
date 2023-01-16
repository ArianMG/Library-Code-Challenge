<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::select('id')->inRandomOrder()->first()->id,
            'book_id' => \App\Models\Book::select('id')->inRandomOrder()->first()->id,
        ];
    }
}
