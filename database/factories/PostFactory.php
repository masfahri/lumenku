<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
    	return [
    	    'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'body'  => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    	];
    }
}
