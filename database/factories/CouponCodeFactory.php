<?php

namespace Database\Factories;

use App\Models\CouponCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CouponCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CouponCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bytes_requried = random_bytes(6);
        $secure_encript_code=bin2hex($bytes_requried);
        return [
            'code'=>$secure_encript_code,
            'discount_percent'=>100,
            'user_id'=>$this->faker->randomElement([4,5,6,7,8,9,10,11,12,13]),
            'experience_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        ];
    }
}
