<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'type'=> 'foods',
            'price'=>$this->faker->randomDigit(3),
            'img'=>'/icons/malashankaw.jpg'
        ];
    }
}
