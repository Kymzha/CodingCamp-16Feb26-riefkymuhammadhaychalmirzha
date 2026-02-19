<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama'          => fake()->name(),
            'tanggal_lahir' => fake()->dateTimeBetween('-60 years', '-5 years')->format('Y-m-d'),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'no_telepon'    => fake()->phoneNumber(),
            'alamat'        => fake()->address(),
        ];
    }
}
