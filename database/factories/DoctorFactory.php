<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake('pt_BR');

        return [
            'city_id' => City::query()->inRandomOrder()->value('id'),
            'name' => $faker->name(),
            'specialty' => $faker->randomElement([
                'Cardiologia',
                'Dermatologia',
                'Pediatria',
                'Ortopedia',
                'Ginecologia',
            ]),
        ];
    }
}
