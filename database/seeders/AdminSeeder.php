<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // bikin user untuk login sebagai admin
        $user = User::updateOrCreate(
            ['email' => 'admin@bbj.com'], // ganti kalau mau
            [
                'name'     => 'Satria Widura',
                'password' => Hash::make('12345678'), // ganti sebelum produksi
                'role'     => 'admin',
            ]
        );

        // bikin profil admin terkait
        Admin::updateOrCreate(
            ['user_id' => $user->id],
            [
                'first_name' => 'Satria',
                'last_name'  => 'Widura',
                'birth_date' => '1990-01-01',
                'phone'      => '081234567890',
                'address'    => 'Kantor PT. Bia Bumi Jayendra',
            ]
        );
    }
}
