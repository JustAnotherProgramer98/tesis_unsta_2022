<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->realText(10),
            'subtitle'=>$this->faker->realText(10),
            'slug'=>'',
            'description'=>$this->faker->realText(20),
            'languaje_id'=>$this->faker->randomElement([1,2,3]),
            'place_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'host_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        ];
    }
}
