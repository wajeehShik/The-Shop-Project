<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagNames = [
            'جديد', 'مميز', 'عروض', 'خصومات', 'أفضل مبيعًا', 'مستورد', 'محلي',
            'عالي الجودة', 'اقتصادي', 'صديق للبيئة', 'محدود الكمية', 'موسمي',
            'رجالي', 'نسائي', 'أطفال', 'إلكتروني', 'رياضي', 'كلاسيكي', 'عصري',
            'يدوي الصنع', 'طبيعي', 'مطبوخ', 'خام', 'مجمد', 'طازج', 'فاخر',
            'أساسي', 'عائلي', 'للسفر', 'منزلي', 'عملي', 'ترفيهي', 'تعليمي',
            'للأعمال', 'زراعي', 'للصيف', 'للشتاء', 'للربيع', 'للخريف', 'مضاد للماء',
            'خفيف الوزن', 'كبير الحجم', 'صغير الحجم', 'عالي الأداء', 'اقتصادي التكلفة',
            'قابل للتعديل', 'متعدد الألوان', 'مناسب للجميع', 'مضاد للصدأ', 'مريح',
            'دائم', 'آمن', 'مخصص', 'متوافق', 'مقاوم للصدمات', 'قوي', 'سريع التحضير',
            'سهل الاستخدام', 'محمي', 'أنيق', 'فريد', 'نادر', 'شائع', 'كهربائي',
            'مزود بالطاقة الشمسية', 'ذكي', 'يدوي', 'أوتوماتيكي', 'مناسب للمكتب',
            'مناسب للمنزل', 'مناسب للسيارة', 'مضاد للتلوث', 'مطابق للمعايير',
            'مصنوع حسب الطلب', 'ذو تصميم حديث', 'ذو تصميم كلاسيكي', 'صحي',
            'مضاد للحساسية', 'عضوي', 'مستدام', 'معتمد', 'سهل الصيانة', 'سهل التخزين',
            'مقاوم للحرارة', 'مقاوم للبكتيريا', 'مقاوم للخدوش', 'متين', 'مرن',
            'خفيف', 'سهل التنظيف', 'قابل لإعادة الاستخدام', 'صديق للحيوانات',
            'قابل للتحلل', 'غير قابل للكسر', 'مضاد للأتربة', 'عالي الجودة'
        ];

        $tags = [];

        foreach ($tagNames as $index => $name) {
            $tags[] = [
                'name' => $name,
                'slug' => Str::slug($name, '-'), // إنشاء slug مناسب
                'status' => (string)rand(0, 1), // حالة عشوائية (1 أو 0)
                'admin_id' => 1, // ثابتة
            ];
        }

        // إدخال البيانات إلى جدول tags
        DB::table('tags')->insert($tags);

    }
}
