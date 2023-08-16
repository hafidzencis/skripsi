<?php

namespace Database\Seeders;

use App\Models\Loan;
use App\Models\TypeDeposit;
use App\Models\TypeInstallment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\User;
use Mockery\Matcher\Type;

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

        User::factory()->create([
            'nama'=>'Muhammad Hafidz Febriansyah',
            'email' => 'hafidzfebrian21@gmail.com',
            'password' => '$2a$04$UiJ2PIe.qUXseu9pnnkOd.X5NTZ1.aes7GePioBGBjgXSfu6ZIeC.',
            'roles' => 'ADMIN',
            'nik' => '3314109907060001',
            'no_hp' => '085294243900',
            'tempat_lahir' => 'Solo',
            'tanggal_lahir' => '1997-09-20',
            'alamat' => 'Sragen',
            'image_ktp' => 'imgmock/scan3x4',
            'image_3x4' => 'imgmock/scanktp',
            'updated_at' => now(),
            'created_at' => now()
        ]);

        User::factory()->create([
            'nama'=>'Falah Yudhistira Hanan',
            'email' => 'falahyudhistira@gmail.com',
            'password' => '$2a$04$UiJ2PIe.qUXseu9pnnkOd.X5NTZ1.aes7GePioBGBjgXSfu6ZIeC.',
            'roles' => 'USER',
            'nik' => '543535363426326',
            'no_hp' => '085294243900',
            'tempat_lahir' => 'Solo',
            'tanggal_lahir' => '1997-09-20',
            'alamat' => 'Sragen',
            'image_ktp' => 'imgmock/scan3x4',
            'image_3x4' => 'imgmock/scanktp',
            'updated_at' => now(),
            'created_at' => now()
        ]);

        User::factory()->create([
            'nama'=>'Raihan Anugerah Guntoro',
            'email' => 'raihananugerah@gmail.com',
            'password' => '$2a$04$UiJ2PIe.qUXseu9pnnkOd.X5NTZ1.aes7GePioBGBjgXSfu6ZIeC.',
            'roles' => 'USER',
            'nik' => '995809458093840',
            'no_hp' => '085294243900',
            'tempat_lahir' => 'Solo',
            'tanggal_lahir' => '1997-09-20',
            'alamat' => 'Sragen',
            'image_ktp' => 'imgmock/scan3x4',
            'image_3x4' => 'imgmock/scanktp',
            'updated_at' => now(),
            'created_at' => now()
        ]);

        User::factory()->create([
            'nama'=>'NdaktauCoy',
            'email' => 'hafidzfebrian20@gmail.com',
            'password' => '$2a$04$UiJ2PIe.qUXseu9pnnkOd.X5NTZ1.aes7GePioBGBjgXSfu6ZIeC.',
            'roles' => 'USER',
            'nik' => '995809458093840',
            'no_hp' => '085294243900',
            'tempat_lahir' => 'Solo',
            'tanggal_lahir' => '1997-09-20',
            'alamat' => 'Sragen',
            'image_ktp' => 'imgmock/scan3x4',
            'image_3x4' => 'imgmock/scanktp',
            'updated_at' => now(),
            'created_at' => now()
        ]);


        TypeDeposit::factory()->create([
            'nama_tipe_deposit' => 'Simpanan Pokok',
            'updated_at' => now(),
            'created_at' => now()
        ]);

        TypeDeposit::factory()->create([
            'nama_tipe_deposit' => 'Simpanan Wajib',
            'updated_at' => now(),
            'created_at' => now()
        ]);

        TypeInstallment::factory()->create([
            'nama_tipe_angsuran' => 'Angsuran Pokok',
            'updated_at' => now(),
            'created_at' => now()
        ]);

        TypeInstallment::factory()->create([
            'nama_tipe_angsuran' => 'Angsuran Jasa',
            'updated_at' => now(),
            'created_at' => now()
        ]);


        Loan::factory()->create([
            'user_id' => 1,
            'nominal_pinjaman' => 5000000,
            'jasa' => 2,
            'tenor' => 12,
            'setuju' => '1',
            'administrasi' => 25000,
            'tanggal_acc_pinjaman' => now(),
            'tipe_pembayaran' => 'DITEMPAT',
            'status' => 'MENGANGSUR',

            'updated_at' => now(),
            'created_at' => now()
        ]);
    }
}
