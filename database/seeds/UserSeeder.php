<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $user =[
            [
                'nama' => 'Staff',
                'email' => 'staff@email.com',
                'password' => bcrypt('staff123'),
                'role_id' => '3',
                'status' => 'active',
                'gambar' => '',
                'remember_token' => ''
            ],
            [
                'nama' => 'SuperDuperAdmin',
                'email' => 'superduperadmin@email.com',
                'password' => bcrypt('superduperadmin123'),
                'role_id' => '1',
                'status' => 'active',
                'gambar' => '',
                'remember_token' => ''
                ]
            ];

            foreach ($user as $u) {
                User::create($u);
            }
        }
    }
