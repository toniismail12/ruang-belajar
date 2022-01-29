<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectDikerjakan;
use App\models\DaftarDataKelas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        User::create([
            'uuid' => Str::uuid(),
            'name' => "Toni Ismail",
            'email' => "tonismail20@gmail.com",
            'password' => bcrypt('123'),
            'role' => 'anggota',

        ]);

         User::create([
            'uuid' => Str::uuid(),
            'name' => "Nurlayli",
            'email' => "nurlayli@gmail.com",
            'password' => bcrypt('123'),
            'role' => 'anggota',

        ]);

         User::create([
            'uuid' => Str::uuid(),
            'name' => "Irfan",
            'email' => "irfan@gmail.com",
            'password' => bcrypt('123'),
            'role' => 'anggota',

        ]);

         User::create([
            'uuid' => Str::uuid(),
            'name' => "Nandita",
            'email' => "nandita@gmail.com",
            'password' => bcrypt('123'),
            'role' => 'anggota',

        ]);

         User::create([
            'uuid' => Str::uuid(),
            'name' => "Sukma Arjanah",
            'email' => "sukma@gmail.com",
            'password' => bcrypt('123'),
            'role' => 'anggota',

        ]);

        User::create([
            'uuid' => Str::uuid(),
            'name' => "toni user 1",
            'email' => "toniuser1@gmail.com",
            'password' => bcrypt('123'),
            'role' => 'user',

        ]);

        User::create([
            'uuid' => Str::uuid(),
            'name' => "toni user 2",
            'email' => "toniuser2@gmail.com",
            'password' => bcrypt('123'),
            'role' => 'user',

        ]);

        User::create([
            'uuid' => Str::uuid(),
            'name' => "Toni Ismail",
            'email' => "superadmin@gmail.com",
            'password' => bcrypt('123'),
            'role' => 'superadmin',

        ]);

        Project::create([
            'uuid' => Str::uuid(),
            'name' => "JASTIP (Jasa Titip Print)",
            'deskripsi' => "start up untuk mendukung anak kuliah mager dan yang mau usaha",
            'mitra' => "start up pribadi",
            'deadline' => "12-12-2021",
        ]);

        Project::create([
            'uuid' => Str::uuid(),
            'name' => "Sistem Absensi Guru",
            'deskripsi' => "sistem absensi untuk guru di smp muhammadiyah 1 muara padang",
            'mitra' => "SMP muhammadiyah 1 Muara Padang",
            'deadline' => "13-12-2021",
        ]);

        Project::create([
            'uuid' => Str::uuid(),
            'name' => "MSDC (Muhammadiyah School Data Center)",
            'deskripsi' => "sistem informasi yang mengelola data sekolah dan monotoring proses pembelajaran di sekolah muhammadiyah muara padang",
            'mitra' => "Pimpinan Cabang Muhammadiyah Muara Padang",
            'deadline' => "14-12-2021",
        ]);

        ProjectDikerjakan::create([
            'uuid' => Str::uuid(),
            'user_id' => "1",
            'project_id' => "3",
        ]);

        ProjectDikerjakan::create([
            'uuid' => Str::uuid(),
            'user_id' => "1",
            'project_id' => "2",
        ]);

        ProjectDikerjakan::create([
            'uuid' => Str::uuid(),
            'user_id' => "1",
            'project_id' => "1",
        ]);

        ProjectDikerjakan::create([
            'uuid' => Str::uuid(),
            'user_id' => "2",
            'project_id' => "1",
        ]);

        ProjectDikerjakan::create([
            'uuid' => Str::uuid(),
            'user_id' => "3",
            'project_id' => "1",
        ]);

        ProjectDikerjakan::create([
            'uuid' => Str::uuid(),
            'user_id' => "4",
            'project_id' => "2",
        ]);

        ProjectDikerjakan::create([
            'uuid' => Str::uuid(),
            'user_id' => "5",
            'project_id' => "2",
        ]);


        DaftarDataKelas::create([
            'kode_kelas' => Str::random('12'),
            'slug' => 'web-development-laravel-8',
            'nama_kelas' => 'Web Development Laravel 8',
            'deskripsi' => 'Belajar pemrograman web development dengan laravel 8 dibimbing dari 0 sampai bisa menghasilkan sebuah prooject web.',
            'angkatan' => '2',
            'harga_kelas' => '0',
            'status_publish' => 'yes',
            'trainer' => '1'
        ]);

        DaftarDataKelas::create([
            'kode_kelas' => Str::random('12'),
            'slug' => 'java-programming-with-netbean',
            'nama_kelas' => 'Java Programming With Netbean',
            'deskripsi' => 'Belajar pemrograman java dengan software netbean. built something amazing.',
            'angkatan' => '2',
            'harga_kelas' => '172.000',
            'status_publish' => 'no',
            'trainer' => '2'
        ]);

        DaftarDataKelas::create([
            'kode_kelas' => Str::random('12'),
            'slug' => 'creative-graphic-design-with-corel',
            'nama_kelas' => 'Creative-Graphic Design With Corel',
            'deskripsi' => 'Menjadi desainer grafis dengan corel draw, salurkan imajinasi menjadi sebuah desain yang menakjubkan.',
            'angkatan' => '2',
            'harga_kelas' => '153.000',
            'status_publish' => 'no',
            'trainer' => '3',
        ]);
    }
}
