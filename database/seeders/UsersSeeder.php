<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'name'=>'Matahari',
                'email'=>'matahari@gmail.com',
                'role'=>'adminn',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Mawar',
                'email'=>'mawar@gmail.com',
                'role'=>'pengguna',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach ($userData as $key => $val){
            User::create ($val);
        }
    }
}
