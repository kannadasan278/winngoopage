<?php
namespace Database\factories;

use App\Models\Privacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrivacyFactory extends Factory
{
    protected $model = Privacy::class;

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
