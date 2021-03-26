<?php

use App\User;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'all-access',
        ]);

        $user=User::create([
            'name'=>'Prueba',
            'email'=>'prueba@tgiperu.com',
            'password'=>Hash::make('12345678'),
        ]);

        $user->roles()->sync(1);
    }
}
