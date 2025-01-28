<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultation>
 */
class ConsultationFactory extends Factory
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
            'doctor_id' => Doctor::query()->inRandomOrder()->value('id') ?? Doctor::factory()->create()->id,
            'patient_id' => Patient::query()->inRandomOrder()->value('id') ?? Patient::factory()->create()->id,
            'date' => $faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
