<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        // Предположим, что у вас есть связь многие ко многим (Many-to-Many) между постами и ингредиентами.

        return [
            "title" => $this->faker->name(),
            "description" => $this->faker->text(),
            "preview" => $this->faker->text(50),
            "thumbnail" => $this->faker->imageUrl(640, 480),
            // Предполагается, что у вас есть связь многие ко многим с таблицей post_ingredients
            "ingredients" => [
                ['ingredient_id' => 1, 'quantity' => $this->faker->numberBetween(1, 100)],
                ['ingredient_id' => 2, 'quantity' => $this->faker->numberBetween(1, 100)],
                // Добавьте другие ингредиенты по аналогии
            ],
        ];
    }
}
