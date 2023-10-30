<?php

namespace Database\Factories;

use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $idSiswa = Siswa::pluck("id_siswa")->toArray();
        $idPetugas = Petugas::pluck("id_petugas")->toArray();
        $idSpp = Spp::pluck("id_spp")->toArray();

        $status = [
            "Paid", "Unpaid"
        ];

        return [
            "tgl_bayar" => $this->faker->date(),
            "bulan_bayar" => $this->faker->monthName(),
            "tahun_bayar" => $this->faker->year(),
            "status" => $this->faker->randomElement($status),
            "id_siswa" => $this->faker->unique()->numberBetween(1, 20),
            "id_petugas" =>  $this->faker->unique()->numberBetween(1, 20),
            "id_spp" => $this->faker->unique()->numberBetween(1, 20)
        ];
    }
}
