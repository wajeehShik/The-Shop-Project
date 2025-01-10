<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Faker\Factory;
class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Factory::create();
        $pages  = [];
        for ($i = 0; $i < 3; $i++) {
           $key = $faker->sentence(mt_rand(1, 3), true);
            $pages [] = [
                'key'  =>$key,
                'value'  =>$faker->sentence(mt_rand(100, 300), true),
                'status'   =>(string)rand('1','0'),
                'admin_id'=>1,
            ];
            
        }  $chunks = array_chunk($pages , 3);
        foreach ($chunks as $chunk) {
            Page::insert($chunk);
        }

    }}
