<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'due_date' => $this->faker->date('Y-m-d', '+ 1 year'),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'done']),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toarray()),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toarray()),
        ];
    }
}
