<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker_id = ['1', '2', '3', '4', '5'];
        $faker_kelas = ["X", 'XI', 'XII', 'XIII'];
        $faker_kompe = ['RPL', 'TOI', 'DPIB', 'TP', 'TB'];

        return [
            "id_kelas" => $this->faker->unique()->numberBetween(1, 10),
            "nama_kelas" => $this->faker->randomElement($faker_kelas),
            'kompetensi_keahlian' => $this->faker->randomElement($faker_kompe),
        ];
    }
}
