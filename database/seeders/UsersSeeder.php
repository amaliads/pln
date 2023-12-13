<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Sari',
                'email'=>'sari@gmail.com',
                'nohp'=>'081234567832',
                'alamat'=>'Jalan Sudirman, Semarang',
                'jabatan'=>'Staff',
                'role'=>'adminn',
                'password'=>Hash::make('123456'),
            ],
            [
                'name'=>'Nuca',
                'email'=>'nuca@gmail.com',
                'nohp'=>'081234567834',
                'alamat'=>'Jalan Kartini, Semarang',
                'jabatan'=>'Staff',
                'role'=>'pengguna',
                'password'=>Hash::make('123456'),
            ],
        ];

        foreach ($userData as $key => $val){
            User::create ($val);
        }
    }
}
