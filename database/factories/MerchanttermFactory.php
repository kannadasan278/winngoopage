<?php
namespace Database\factories;

use App\Models\Merchantterm;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchanttermFactory extends Factory
{
    protected $model = Merchantterm::class;

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
