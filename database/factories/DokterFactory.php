<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactory extends Factory
{
    public function definition(): array
    {
        $spesialis = ['Umum', 'Gigi', 'Anak', 'Kandungan', 'Mata', 'THT', 'Kulit', 'Jantung'];

        return [
            'nama'       => 'dr. ' . fake()->name(),
            'spesialis'  => fake()->randomElement($spesialis),
            'no_telepon' => fake()->phoneNumber(),
            'email'      => fake()->unique()->safeEmail(),
            'alamat'     => fake()->address(),
        ];
    }
}
