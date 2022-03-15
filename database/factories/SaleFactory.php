<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount'=>$this->faker->numberBetween(500,2500),
            'experience_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'buyer_id'=>$this->faker->randomElement([4,5,6,7,8,9,10]),
        ];
    }
}
