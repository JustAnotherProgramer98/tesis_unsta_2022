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
            
            'city_id'=>$this->faker->randomElement(['1', '2','3','4', '5','6','7', '8','9','10','11','12', '13','14','15','16','17', '18','19','20','21','22', '23','24','25','26','27', '28','29','30','31','32','33']),
            'adress'=>$this->faker->address(),
            'coordenates'=>$this->faker->countryCode(),
        ];
    }
}
