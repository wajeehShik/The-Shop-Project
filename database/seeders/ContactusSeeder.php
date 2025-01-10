<?php

namespace Database\Seeders;


use App\Models\Admin;
use App\Models\Contactus;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ContactusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactRequests = [
            [
                'name' => 'محمد العتيبي',
                'email' => 'mohammed.alotaibi@example.com',
                'phone' => '0501234567',
                'message' => 'أرغب في الاستفسار عن حالة الطلب رقم 12345.',
                'subject' => 'استفسار عن الطلب',
                'status' => '1',
            ],
            [
                'name' => 'سارة الأحمد',
                'email' => 'sara.ahmad@example.com',
                'phone' => '0549876543',
                'message' => 'لدي مشكلة في تسجيل الدخول إلى حسابي.',
                'subject' => 'مشكلة في الحساب',
                'status' => '1',
            ],
            [
                'name' => 'عبدالله الشمري',
                'email' => 'abdullah.alshammari@example.com',
                'phone' => '0531112223',
                'message' => 'هل يمكنني إلغاء الطلب رقم 67890؟',
                'subject' => 'إلغاء الطلب',
                'status' => '1',
            ],
            [
                'name' => 'ريم الحربي',
                'email' => 'reem.alharbi@example.com',
                'phone' => '0594567890',
                'message' => 'ما هي سياسة الاسترجاع لديكم؟',
                'subject' => 'استفسار عن سياسة الاسترجاع',
                'status' => '1',
            ],
            [
                'name' => 'خالد الدوسري',
                'email' => 'khaled.aldosari@example.com',
                'phone' => '0523334445',
                'message' => 'أود تقديم اقتراح لتحسين تجربة الموقع.',
                'subject' => 'اقتراح لتحسين الخدمة',
                'status' => '1',
            ],
            [
                'name' => 'نورة المطيري',
                'email' => 'noura.almotairi@example.com',
                'phone' => '0589998887',
                'message' => 'هل يوجد ضمان على المنتجات الإلكترونية؟',
                'subject' => 'استفسار عن الضمان',
                'status' => '1',
            ],
            [
                'name' => 'أحمد الغامدي',
                'email' => 'ahmad.alghamdi@example.com',
                'phone' => '0552221110',
                'message' => 'متى سيتم شحن طلبي رقم 34567؟',
                'subject' => 'استفسار عن الشحن',
                'status' => '1',
            ],
            [
                'name' => 'فاطمة الشهراني',
                'email' => 'fatima.alshahrani@example.com',
                'phone' => '0514561234',
                'message' => 'أرغب في طلب منتج غير موجود في المتجر.',
                'subject' => 'طلب منتج جديد',
                'status' => '1',
            ],
            [
                'name' => 'ياسر الزهراني',
                'email' => 'yaser.alzahrani@example.com',
                'phone' => '0579876543',
                'message' => 'واجهت مشكلة أثناء الدفع باستخدام البطاقة الائتمانية.',
                'subject' => 'مشكلة في الدفع',
                'status' => '1',
            ],
            [
                'name' => 'منى السبيعي',
                'email' => 'mona.alsobai@example.com',
                'phone' => '0596541237',
                'message' => 'ما هي مواعيد العمل الرسمية؟',
                'subject' => 'استفسار عن مواعيد العمل',
                'status' => '1',
            ],
            // أكمل باقي الطلبات بنفس النمط
        ];

        // استكمال الطلبات للوصول إلى 100
        while (count($contactRequests) < 100) {
            $contactRequests[] = [
                'name' => 'عميل إضافي ' . (count($contactRequests) + 1),
                'email' => 'client' . (count($contactRequests) + 1) . '@example.com',
                'phone' => '05' . rand(10000000, 99999999),
                'message' => 'رسالة افتراضية للعميل ' . (count($contactRequests) + 1),
                'subject' => 'موضوع افتراضي ' . (count($contactRequests) + 1),
                'status' => (string)rand(0, 1),
            ];
        }

        // إدخال البيانات إلى جدول contactus
        DB::table('contactuses')->insert($contactRequests);
    }
}
