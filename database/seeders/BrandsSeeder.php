<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $brandNames = [
            'آبل', 'سامسونج', 'مايكروسوفت', 'سوني', 'إل جي',
            'هواوي', 'شاومي', 'ديل', 'إتش بي', 'لينوفو',
            'نايكي', 'أديداس', 'بوما', 'ريبوك', 'غوتشي',
            'شانيل', 'لويس فويتون', 'أوبر', 'تويوتا', 'مرسيدس'
        ];

        $brands = [];

        foreach ($brandNames as $index => $name) {
            $imageNumber = ($index % 11) + 1; 
            $brands[] = [
                'name' => $name,
                'slug' => Str::slug($name, '-'),
                'image' => 'brand' . $imageNumber . '.png', // صور من brand_1.jpg إلى brand_20.jpg
                'status' => (string)rand(0, 1), // حالة عشوائية (1 أو 0)
                'admin_id' => 1, // ثابتة
            ];
        }

        // إدخال البيانات إلى جدول brands
        DB::table('brands')->insert($brands);
 
    }
}
