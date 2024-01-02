<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //memasukan data dummy
        $userData = [
            [
                'nama'=> 'Owner Zak',
                'email'=> 'zakown@gmail.com',
                'role'=> 'owner',
                'password'=>bcrypt('1234'),
            ],
            [
                'nama'=> 'Flora Shafiqa',
                'email'=> 'flo@gmail.com',
                'role'=> 'kasir',
                'password'=>bcrypt('1234'),
            ],

        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
