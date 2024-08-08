<?php
namespace Database\factories;

use App\Models\Memberterm;
use Illuminate\Database\Eloquent\Factories\Factory;

class MembertermFactory extends Factory
{
    protected $model = Memberterm::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
