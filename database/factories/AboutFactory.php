<?php
namespace Database\factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    protected $model = About::class;

    public function definition()
    {
        return [
            'about_intro_1' => $this->faker->paragraphs(3, true),
            'about_intro_2' => $this->faker->paragraphs(3, true),
            'about_online_use' => $this->faker->paragraphs(3, true),
            'offline_loyalty_card_us' => $this->faker->paragraphs(3, true),
            'about_us_charity' => $this->faker->paragraphs(3, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
