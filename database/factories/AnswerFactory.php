<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraphs(rand(3, 7), true),
            'user_id' => User::pluck('id')->random(),
            'votes_count' => rand(0, 5),
        ];
    }
}
