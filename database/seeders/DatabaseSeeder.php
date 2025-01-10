<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            SettingsSeeder::class,
           PermissionTableSeeder::class,
           CreateUsersSeeder::class,
           CategoriesSeeder::class,
           TagsSeeder::class,
           BrandsSeeder::class,
             FaqsSeeder::class,
             ContactusSeeder::class,
             PagesSeeder::class,
           ProductsSeeder::class,
           ProductsTagsSeeder::class,
          ProductsImageSeeder::class,
          UsersSeeder::class,
           OrderSeeder::class,
        RattingSeeder::class,

        ]);
    }
}
