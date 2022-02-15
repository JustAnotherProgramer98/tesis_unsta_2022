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
        $bodies=['Excelente , la pase genial','Muy recomendada','Llovio ese dia , pero me encanto',
        'Me gusto , lo repetiria','Gran experiencia para hacer en Tucuman','Horrible , pesimo el trafico que hubo ese dia'
        ,'No me termino de convencer','Me gusto pero no me volvio loco','Un dia diferente, me gusto!',
        'Volveria siempre que pudiese','No me gusto lo suficiente'];
        return [
            'body'=>$this->faker->randomElement($bodies),
            'stars'=>$this->faker->randomElement([1,2,3,4,5]),
            'user_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'experience_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        ];
    }
}
