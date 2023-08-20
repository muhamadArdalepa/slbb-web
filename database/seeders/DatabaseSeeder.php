<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Nav;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Berita::factory(30)->create();

        $pages = [
            [
                'name' => 'Profile Sekolah',
                'route' => 'profile-sekolah',
                'is_auth' => 0,
            ],
            [
                'name' => 'Berita',
                'route' => 'berita',
                'is_auth' => 0,
            ],
            [
                'name' => 'Ekstrakurikuler',
                'route' => 'ekstrakurikuler',
                'is_auth' => 0,
            ],
            [
                'name' => 'Prestasi',
                'route' => 'prestasi',
                'is_auth' => 0,
            ],
            [
                'name' => 'Kontak',
                'route' => 'kontak',
                'is_auth' => 0,
            ],
            [
                'name' => 'Kegiatan Siswa',
                'route' => 'kegiatan siswa',
                'is_auth' => 0,
            ],
            [
                'name' => 'Sejarah Singkat',
                'route' => 'sejarah',
                'parent_id' => 1,
                'is_auth' => 0,
            ],
            [
                'name' => 'Visi Misi',
                'route' => 'visi-misi',
                'parent_id' => 1,
                'is_auth' => 0,
            ],
            [
                'name' => 'Sarana Prasarana',
                'route' => 'sarana-prasarana',
                'parent_id' => 1,
                'is_auth' => 0,
            ],
            [
                'name' => 'Struktur Organisasi',
                'route' => 'struktur-organisasi',
                'parent_id' => 1,
                'is_auth' => 0,
            ],
            [
                'name' => 'Guru dan Staff',
                'route' => 'guru-dan-staff',
                'parent_id' => 1,
                'is_auth' => 0,
            ],
            [
                'name' => 'Berita Terbaru',
                'route' => 'berita',
                'parent_id' => 2,
                'is_auth' => 0,
            ],
            [
                'name' => 'Galeri',
                'route' => 'galeri',
                'parent_id' => 2,
                'is_auth' => 0,
            ],
        ];
        foreach ($pages as $page) {
            Nav::insert($page);
        }

        for ($i=0; $i < 10; $i++) { 
            \App\Models\Ekskuls::create([
                'name' => fake()->word(),
                'desc' => fake()->sentence(2),
                'img' => 'https://dummyimage.com/4:3x1080/',
                'editor' => 1,
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            \App\Models\Sarpras::create([
                'name' => fake()->word(),
                'desc' => fake()->sentence(2),
                'img' => 'https://dummyimage.com/4:3x1080/',
                'editor' => 1,
            ]);
        }
        for ($i=0; $i < 20; $i++) {
            $juara = random_int(1,3);
            \App\Models\Prestasi::create([
                'name' => 'Juara '.$juara.' '.substr(fake()->sentence(4), 0, -1),
                'rank' => $juara,
                'desc' => substr(fake()->sentence(4), 0, -1),
                'year' => fake()->year(),
                'type' => random_int(1,2),
                'editor' => 1,
            ]);
        }
    }
}
