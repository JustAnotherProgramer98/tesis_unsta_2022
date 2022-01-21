<?php

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Place::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'province'=>$this->faker->country(),
            'city'=>$this->faker->city(),
            'adress'=>$this->faker->address(),
            'coordenates'=>$this->faker->countryCode(),
        ];
    }
}
