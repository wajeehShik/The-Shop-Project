<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = [
            'أجهزة منزلية', 'ملابس رجالية', 'ملابس نسائية', 'ألعاب أطفال', 'كتب تعليمية',
            'هواتف ذكية', 'إلكترونيات', 'أثاث مكتبي', 'معدات رياضية', 'أطعمة مجمدة',
            'منتجات تجميل', 'إكسسوارات', 'أجهزة طبية', 'معدات تصوير', 'ساعات يد',
            'حقائب سفر', 'ديكورات منزلية', 'أجهزة طهي', 'منتجات أطفال', 'لوازم مدرسية',
            'أدوات مكتبية', 'عطور', 'ملابس شتوية', 'ملابس صيفية', 'أحذية رياضية',
            'معدات زراعية', 'أجهزة كمبيوتر', 'برمجيات', 'معدات بناء', 'مستلزمات تنظيف',
            'سيارات وأكسسوارات', 'ألعاب فيديو', 'أجهزة تلفاز', 'معدات صيد', 'مجوهرات',
            'أدوات منزلية', 'أجهزة تبريد', 'كتب روايات', 'منتجات طبيعية', 'أدوات خياطة',
            'أجهزة إنارة', 'معدات سلامة', 'أدوات مطبخ', 'لوحات فنية', 'هواتف ثابتة',
            'أجهزة صوت', 'ملابس أطفال', 'معدات طبية', 'ألعاب تعليمية', 'مستلزمات حدائق'
        ];

        $categories = [];

        foreach ($categoryNames as $index => $name) {
            $imageNumber = ($index % 11) + 1; // توزيع الصور من 1 إلى 11 بشكل دائري
            $categories[] = [
                'name' => $name,
                'slug' => Str::slug($name, '-'), // إنشاء slug مناسب
                'status' => (string)rand(0, 1), // حالة عشوائية
                'admin_id' => 1, // ثابتة
                'image' => 'brand' . $imageNumber . '.png', // اسم الصورة بناءً على التوزيع
            ];
        }

        // إدخال البيانات إلى جدول categories
        DB::table('categories')->insert($categories);
    }
}
