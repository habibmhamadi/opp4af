<?php

namespace Database\Factories;

use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpportunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Opportunity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(100),
            'category_id' => rand(1, 3),
            'organization' => $this->faker->text(20),
            'fund_id' => rand(2, 5),
            'deadline' => now()->addDays(rand(1, 60)),
            'description' => $this->faker->text(500),
            'user_id' => 1,
            'image' => $this->faker->imageUrl(320, 240),
            'published' => true
        ];
    }
}
