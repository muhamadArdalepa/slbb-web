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
        $kelas = ['A', 'B', 'C', 'D', 'E'];
        $jenjang = ['sdlb', 'smplb', 'smalb'];
        for ($h = 0; $h < 3; $h++) {
            if ($h == 0) {
                $m = 1;
                $n = 6;
            } else if ($h == 1) {
                $m = 7;
                $n = 9;
            } else {
                $m = 10;
                $n = 12;
            }
            for ($i = $m; $i <= $n; $i++) {
                for ($j = 0; $j < 5; $j++) {
                    \App\Models\Kelas::create([
                        'name' => $i . $kelas[$j],
                        'jenjang' => $jenjang[$h],
                    ]);
                }
            }
        }


        \App\Models\User::create([
            'name' => 'Admin',
            'role' => 1,
            'username' => 'admin',
            'email' => 'admin@slbbdharmaasih.sch.id',
            'picture' => 'profil_gambar/dummy.png',
            'password' => bcrypt('admin')
        ]);

        for ($i = 0; $i < 20; $i++) {
            $name = fake()->name();
            $number = random_int(0, 99);
            $pos = strpos($name, ".");

            if ($pos !== false) {       
                $username = substr($name, 0, $pos-1);
                $username = str_replace(" ", "", $username);
            }else{
                $username = str_replace(" ", "", $name);
            }


            \App\Models\User::create([
                'name' => $name,
                'role' => random_int(2, 3),
                'username' => strtolower($username . $number),
                'email' => strtolower($username. $number) . '@gmail.com',
                'picture' => 'profil_gambar/dummy.png',
                'nimp' => fake()->numerify('################'),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]);
        }

        for ($i = 1; $i <= 60; $i++) {
            for ($j = 0; $j < 10; $j++) {
                $fname = fake()->firstName();
                $lname = fake()->lastName();
                $number = random_int(0, 99);
                \App\Models\User::create([
                    'name' => $fname . ' ' . $lname,
                    'role' => random_int(2, 3),
                    'username' => strtolower($fname . $lname . $number),
                    'email' => strtolower($fname . $lname . $number) . '@gmail.com',
                    'picture' => 'profil_gambar/dummy.png',
                    'nimp' => fake()->numerify('################'),
                    'kelas_id' => $i,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                ]);
            }
        }


        \App\Models\Berita::factory(30)->create();

        $pages = [
            [
                'name' => 'Profile Sekolah',
                'route' => 'profil-sekolah',
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
                'route' => 'kegiatan-siswa',
                'is_auth' => 1,
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
                'name' => 'Tenaga Pengajar',
                'route' => 'tenaga-pengajar',
                'parent_id' => 1,
                'is_auth' => 0,
            ],
            [
                'name' => 'Daftar Siswa',
                'route' => 'siswa',
                'parent_id' => 1,
                'is_auth' => 1,
            ],
            [
                'name' => 'Berita Terbaru',
                'route' => 'terbaru',
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

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Ekskuls::create([
                'name' => fake()->word(),
                'desc' => fake()->sentence(2),
                'img' => 'ekskul_gambar/dummy.png',
                'editor' => 1,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Sarpras::create([
                'name' => fake()->word(),
                'desc' => fake()->sentence(2),
                'img' => 'sarana-prasarana_gambar/dummy.png',
                'editor' => 1,
            ]);
        }
        for ($i = 0; $i < 20; $i++) {
            $juara = random_int(1, 3);
            \App\Models\Prestasi::create([
                'name' => 'Juara ' . $juara . ' ' . substr(fake()->sentence(4), 0, -1),
                'rank' => $juara,
                'desc' => substr(fake()->sentence(4), 0, -1),
                'year' => fake()->year(),
                'type' => random_int(1, 2),
                'editor' => 1,
            ]);
        }

        \App\Models\Sejarah::create([
            'title' => 'Sejarah SLB - B Dharma Asih',
            'img' => 'sejarah_gambar/dummy.png',
            'body' => 'ini body sejarah',
            'editor' => 1,
        ]);

        \App\Models\VisiMisi::create([
            'img' => 'visi-misi_gambar/dummy.png',
            'visi' => 'ubah visi disini',
            'misi' => 'ubah visi disini',
            'editor' => 1,
        ]);
        \App\Models\StrukturOrganisasi::create([
            'img' => 'struktur-organisasi_gambar/struktur-organisasi.png',
            'editor' => 1,
        ]);
    }
}
