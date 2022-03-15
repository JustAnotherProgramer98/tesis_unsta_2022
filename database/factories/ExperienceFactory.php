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
        $titles=['Salida al cadillal','Cena en el San Javier','Cabalgata en Tafi del Valle',
        'Cascada los pizarros','Visita al zoologico de Horco Molle','Salida de compras al Solar','Visita a la casa historica'
        ,'Visita a la casa de Gobierno','Espectaculo en el teatro Alberdi','Recorrido por el centro de la ciudad','Ver al dk'];
        return [
            'title'=>$this->faker->randomElement($titles),
            'price'=>$this->faker->numberBetween($min = 1500, $max = 6000),
            'subtitle'=>$this->faker->realText(10),
            'quantity_clients'=>$this->faker->randomElement([2,3,4,5,6,7,8,9,10]),
            'slug'=>str_replace(' ', '-', strtolower($this->faker->randomElement($titles))),
            'description'=>$this->faker->realText(20),
            'place_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'host_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        ];
    }
}
