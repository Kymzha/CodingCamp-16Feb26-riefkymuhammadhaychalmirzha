<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministrasiFactory extends Factory
{
    public function definition(): array
    {
        $keluhans = [
            'Demam tinggi dan sakit kepala',
            'Batuk berdahak sudah seminggu',
            'Sakit perut bagian bawah',
            'Mual dan pusing',
            'Gigi berlubang dan nyeri',
            'Mata merah dan berair',
            'Sesak nafas ringan',
            'Nyeri sendi dan pegal',
            'Ruam merah di kulit',
            'Sakit tenggorokan',
        ];

        $diagnosas = [
            'Demam tifoid ringan',
            'Bronkitis akut',
            'Gastritis',
            'ISPA ringan',
            'Karies gigi stadium 2',
            'Konjungtivitis',
            'Asma ringan',
            'Rematik',
            'Dermatitis',
            'Faringitis',
        ];

        return [
            'pasien_id'       => Pasien::inRandomOrder()->first()->id,
            'dokter_id'       => Dokter::inRandomOrder()->first()->id,
            'tanggal_periksa' => fake()->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
            'keluhan'         => fake()->randomElement($keluhans),
            'diagnosa'        => fake()->randomElement($diagnosas),
            'biaya'           => fake()->randomElement([50000, 75000, 100000, 125000, 150000, 200000, 250000, 300000]),
            'status'          => fake()->randomElement(['Menunggu', 'Selesai', 'Batal']),
        ];
    }
}
