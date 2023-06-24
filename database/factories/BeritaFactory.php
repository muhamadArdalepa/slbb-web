<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paragrafCount = 3;
        $minKalimat = 15;
        $maxKalimat = 30;

        $teks = '';
        for ($i = 0; $i < $paragrafCount; $i++) {
            $kalimatCount = $this->faker->numberBetween($minKalimat, $maxKalimat);
            $kalimat = $this->faker->paragraphs($kalimatCount);
            $paragraf = '<p>' . implode(' ', $kalimat) . '</p>';
            $teks .= $paragraf;
        }
        return [
            'judul' => $this->faker->sentence,
            'isi' => $teks,
            'slug' => $this->faker->slug,
            'excerp' => $this->faker->paragraph,
            'gambar' => 'dummy_gambar.jpg',
            'user_id' => User::all()->random()->id, // Mengambil ID secara acak dari tabel Users
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
