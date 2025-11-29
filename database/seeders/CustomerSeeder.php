<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun login customer
        $user = User::updateOrCreate(
            ['email' => 'customer@bbj.com'], // email customer
            [
                'name'     => 'Kelvien Fareska',   // bisa apa saja, nanti tidak terlalu dipakai
                'password' => Hash::make('12345678'), // minimal 8 karakter
                'role'     => 'customer',
            ]
        );

        // Buat profil customer
        Customer::updateOrCreate(
            ['user_id' => $user->id],
            [
                'first_name' => 'Kelvien',
                'last_name'  => 'Fareska',
                'birth_date' => '1995-05-15',
                'phone'      => '081234567891',
                'address'    => 'Jl. Merpati No. 12, Surabaya',
            ]
        );
    }
}
