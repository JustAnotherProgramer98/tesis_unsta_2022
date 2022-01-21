<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'=>$this->faker->realText(20),
            'user_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'experience_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        ];
    }
}
