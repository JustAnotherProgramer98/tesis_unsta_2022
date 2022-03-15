<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $names=['Facundo','Gabriela','Gabriel','Ernesto','David',
        'Milagros','Micaela','Maria Jose' , 'Jose' , 'Adrian','Santiago',
        'Clemente','Carolina','Fernando','Florencia','Josefina','Maria',
        'Camila','Sabrina','Ignacio','Felix','Paula','Joaquin','Dario','Matias','Juan Pablo','Baltazar'];

        $surnames=['Paz','Rotondo','Gutierrez','Perez','Arboleda','Reyes','Campazzo',
        'Benitez','Palermo','Musso','Ocampos' ,'Curia','Angelici','Fernandez','Oblack',
        'Perotti','Piedra Buena','Nadder','Londra'];
        return [
            'name' => $this->faker->randomElement($names),
            'surname'=> $this->faker->randomElement($surnames),
            'cuit'=> $this->faker->phoneNumber(),
            'birthday'=> $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => 2,
            'gender' => true,
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'province' => $this->faker->city(),
            'country' => $this->faker->country(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
