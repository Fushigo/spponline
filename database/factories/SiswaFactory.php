<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "nisn" => $this->faker->unique()->randomNumber(9),
            "nis" => $this->faker->unique()->randomNumber(9),
            "nama" => $this->faker->name(),
            "alamat" => $this->faker->address(),
            "no_telp" => $this->faker->phoneNumber(),
            "id_kelas" => mt_rand(1, 5),
            "id_spp" => mt_rand(1, 5),
        ];
    }
}
