<?php

namespace Database\Seeders;

use App\Models\Days;
use App\Models\Karyawan;
use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Waktu;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'nama' => 'Sandhi Putrawan',
            'email' => 'sanssajadong@gmail.com',
            'username' => 'sans',
            'password' => bcrypt('1111'),
            'notelp' => '0850000000',
            'tgl_lahir' => '2022-08-03',
            'alamat' => 'Bantas Tengah',
            'role' => 'User'
        ]);

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'notelp' => '0821-4696-9147',
            'tgl_lahir' => '2022-08-03',
            'alamat' => 'Tabanan',
            'role' => 'Admin'
        ]);

        Karyawan::create([
            'nama' => 'Thomas',
            'email' => 'thomassujiwa@gmail.com',
            'notelp' => '0821-4696-9147',
            'tgl_lahir' => '2022-03-02',
            'alamat' => 'Tabanan'
        ]);

        // Karyawan::create([
        //     'nama' => 'Sandhi',
        //     'email' => 'sandiputrawan@gmail.com',
        //     'notelp' => '087111222333444',
        //     'tgl_lahir' => '2022-03-02',
        //     'alamat' => 'Tabanan'
        // ]);

        Waktu::create([
            'jam' => '10:00:00'
        ]);
        Waktu::create([
            'jam' => '11:00:00'
        ]);
        Waktu::create([
            'jam' => '14:00:00'
        ]);
        Waktu::create([
            'jam' => '15:00:00'
        ]);
        Waktu::create([
            'jam' => '16:00:00'
        ]);
        Waktu::create([
            'jam' => '17:00:00'
        ]);
        Waktu::create([
            'jam' => '19:00:00'
        ]);


        Layanan::create([
            'nama_lyn' => 'UNDERCUT',
            'harga_lyn' => '20000'
        ]);
        Layanan::create([
            'nama_lyn' => 'BUZZCUT',
            'harga_lyn' => '24000'
        ]);
        Layanan::create([
            'nama_lyn' => 'TWO BLOCK',
            'harga_lyn' => '30000'
        ]);
        Layanan::create([
            'nama_lyn' => 'SPIKE',
            'harga_lyn' => '23000'
        ]);
        Layanan::create([
            'nama_lyn' => 'CREWCUT',
            'harga_lyn' => '20000'
        ]);
        Layanan::create([
            'nama_lyn' => 'CURTAIN',
            'harga_lyn' => '28000'
        ]);
        Layanan::create([
            'nama_lyn' => 'FRENCH CROP',
            'harga_lyn' => '30000'
        ]);
        Layanan::create([
            'nama_lyn' => 'MULLET',
            'harga_lyn' => '28000'
        ]);
        Layanan::create([
            'nama_lyn' => 'QUIFF',
            'harga_lyn' => '25000'
        ]);
        Layanan::create([
            'nama_lyn' => 'SIDE PART',
            'harga_lyn' => '20000'
        ]);
        Layanan::create([
            'nama_lyn' => 'AFRO',
            'harga_lyn' => '32000'
        ]);
        Layanan::create([
            'nama_lyn' => 'COMMA HAIR',
            'harga_lyn' => '30000'
        ]);
    }
}
