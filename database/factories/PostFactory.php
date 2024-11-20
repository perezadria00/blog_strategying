<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'category_id' => Category::factory(),  // Esto está bien, se crea un Category con su id
            'tag_id' => Tag::factory(),  // Aquí deberías usar Tag::factory() para crear una instancia de Tag
            'user_id' => User::factory(),  // Esto también está bien, se crea un User con su id
        ];
        
    }
}
