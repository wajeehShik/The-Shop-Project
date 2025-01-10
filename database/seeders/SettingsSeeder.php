<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Setting::create([
            'name'=>'Ecomerce',
            'logo'=>'logo.svg',
            'description'=>'this website is ecomerce to show products',
            'phone_number'=>'0595913186',
            'facebook'=>'facebook.com',
            'twiter'=>'x.com',
            'instagram'=>'instagram.com',
            'skyp'=>'sky.com',
            'gmail'=>'snuora2019@gmail.com',
            'whatsapp'=>'+972595913186',
        ]);
    }
}
