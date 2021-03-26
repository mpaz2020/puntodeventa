<?php

use App\Printer;
use Illuminate\Database\Seeder;

class PrinterTableSeeder extends Seeder
{

    public function run()
    {
        Printer::create([
            'name'=>'EPSON0B4773 (L395 Series)'
        ]);
    }
}
