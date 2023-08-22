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
            'title' => $this->faker->sentence,
            'body' => $teks,
            'slug' => $this->faker->slug,
            'excerp' => $this->faker->paragraph,
            'img' => 'berita_gambar/dummy.png',
            'editor' => 1,
        ];
    }
}
