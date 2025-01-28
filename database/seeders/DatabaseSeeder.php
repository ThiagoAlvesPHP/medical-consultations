<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        City::factory(40)->create();
        Patient::factory(30)->create();
        Doctor::factory(20)->create();
        Consultation::factory(10)->create();
    }
}
