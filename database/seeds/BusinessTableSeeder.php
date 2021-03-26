<?php

use App\Business;
use Illuminate\Database\Seeder;

class BusinessTableSeeder extends Seeder
{

    public function run()
    {
        Business::create([
            'name' => 'TGI INGENIERIA EIRL',
            'description' => 'Automatizacion industrial',
            'logo' => 'logo.png',
            'mail' => 'ejemplo@gmail.com',
            'address' => '553 av. A Piura',
            'ruc' => '12345678910',
        ]);
    }
}
