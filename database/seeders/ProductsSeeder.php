<?php

namespace Database\Seeders;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::table('categories')->pluck('id')->toArray(); // الأقسام
        $brands = DB::table('brands')->pluck('id')->toArray(); // العلامات التجارية

        // قائمة بأسماء منتجات حقيقية وفريدة
        $productTitles = [
      
            'هاتف آيفون 15 برو', 'لابتوب ديل XPS 13', 'ساعة سامسونج جالكسي 6', 'سماعات آبل AirPods Pro',
            'تلفاز سامسونج 55 بوصة QLED', 'كاميرا كانون EOS 90D', 'ثلاجة هيتاشي 16 قدم', 
            'خلاط كهربائي كينوود', 'غسالة سامسونج أوتوماتيك 8 كجم', 'مكنسة دايسون V15', 
            'مكيف جنرال سبلت 24 وحدة', 'جهاز مشي فتنس 580', 'كرسي مكتب مريح Ergotune', 
            'طابعة HP DeskJet 2720', 'ماوس ريزر DeathAdder V2', 'كيبورد ميكانيكي HyperX', 
            'لابتوب ماك بوك برو M2', 'ميكروويف باناسونيك 25 لتر', 'غسالة صحون بيكو 6 برامج', 
            'جهاز الألعاب بلايستيشن 5', 'سماعات سوني WH-1000XM4', 'شاشة LG UltraGear 27 بوصة', 
            'طاولة مكتب حديثة', 'أريكة ثلاثية جلدية', 'طاولة قهوة زجاجية', 'مكتبة كتب خشبية', 
            'مجموعة أواني طهي', 'خلاط يدوي مولينكس', 'محضرة طعام براون', 'مكواة بخار فيليبس', 
            'مجموعة مستحضرات عناية بالبشرة', 'عطر شانيل بلو 100 مل', 'عطر ديور سوفاج 100 مل', 
            'ساعة رولكس كلاسيك', 'حقيبة ظهر سامسونايت', 'سوار ذكي شاومي مي باند 8', 
            'لعبة مونوبولي الأصلية', 'دراجة جبلية TREK', 'ملابس رياضية نايك للرجال', 
            'ملابس رياضية أديداس للنساء', 'حذاء رياضي بوما', 'شاشة ألعاب MSI 32 بوصة', 
            'لوحة فنية ديكورية', 'جهاز تنظيف بالبخار كارشر', 'مجموعة أقلام خط عربي', 
            'مجموعة ألوان مائية احترافية', 'مكبر صوت JBL Charge 5', 'لوحة شحن لاسلكية بلوجي', 
            'خيمة تخييم عائلية', 'كاميرا مراقبة هيك فيجن', 'جهاز بصمة الحضور', 
            'مجموعة شواحن سريعة لجميع الأجهزة', 'كرسي ألعاب DXRacer', 'مكتب أطفال متعدد الاستخدام', 
            'ساعة يد كاسيو كلاسيكية', 'مبخرة إلكترونية بتصميم حديث', 'مكنسة روبوت ذكية', 
            'شاشة سامسونج OLED 4K', 'حقيبة لابتوب بيلكين', 'كاميرا ويب لوجيتك C920', 
            'مبرد مائي للمعالج كورسير', 'وحدة تخزين خارجي WD 4TB', 'أقراص SSD سامسونج 1TB', 
            'سماعات جيمينج كروسير HS80', 'كابل شحن سريع أنكر', 'ماكينة صنع القهوة نسبرسو', 
            'آلة صنع الفشار المنزلية', 'مبرد مياه كولين', 'خزانة أحذية حديثة', 'طقم سرير مزدوج', 
            'مرآة ديكور بالحائط', 'مجموعة تمارين مقاومة', 'دراجة كهربائية صغيرة', 'مكبر صوت للمساجد', 
            'شاشة تعمل باللمس HP', 'مجموعة عدسات للهواتف الذكية', 'أغطية هاتف مرنة', 
            'حذاء تنس رياضي فيلا', 'كابلات HDMI فائقة الجودة', 'مبرد سيارة متنقل', 
            'ماكينة حلاقة رجالية فيليبس', 'فرشاة تنظيف كهربائية للوجه', 'ألعاب تعليمية للأطفال', 
            'مجموعة دمى باربي', 'مسجل صوت رقمي', 'سخان ماء فوري', 'ساعة سيكو أوتوماتيكية', 
            'منظار رؤية ليلية', 'ميزان رقمي للمطبخ', 'كوب حافظ للحرارة', 'مظلة شمسية مقاومة للرياح', 
            'طقم سفرة من 24 قطعة', 'كرسي أطفال للسيارة', 'مجموعة كراسي خشبية', 'كاميرا تصوير تحت الماء', 
            'مرطب هواء ذكي', 'مشغل أقراص بلوراي', 'رفوف تخزين معدنية', 'جهاز فاكس حديث', 
            'مستشعر إضاءة ذكي', 'مجموعة شفرات حلاقة نسائية', 'كرسي هزاز خشبي', 'آلة عجن خبز أوتوماتيكية', 
            'خلاط عصير محمول', 'طقم مقالي غير لاصقة', 'دفاية كهربائية صغيرة', 'مجموعة مستلزمات حمام',
            'خزانة ملابس خشبية', 'لوحة مفاتيح لوجيتك', 'خلاط كينوود', 'غسالة صحون LG', 'حقيبة يد بربري', 
            'ماكينة تحضير القهوة بريفيل', 'شاشة سامسونج 32 بوصة', 'حقيبة سفر ترافل', 'ساعة فيتبيت سبورت', 
            'حذاء رياضي نايك', 'محفظة جلدية تومي هيلفيغر', 'سماعة بلوتوث سامسونج', 'خلاط يدوي فيليبس', 
            'طاولة قهوة مع كراسي', 'شاشة عرض سامسونج 4K', 'قارب زوارق قابل للنفخ', 'سكوتر كهربائي Xiaomi',
            'طابعة صور فوجي فيلم', 'ميكروويف ميديا', 'موتوسيكل هوندا CRF450R', 'هاتف سامسونج جالكسي S23',
            'مكيف هواء توشيبا', 'جهاز جيمينج XBOX Series X', 'كاميرا ديجيتال سوني', 'خيمة تخييم صغيرة', 
            'ساعة ذكية سامسونج جالكسي واتش 6', 'شاشة LED 4K', 'مجموعة أدوات عناية بالشعر', 
            'مظلة شمسية سميكة', 'جهاز تنقية الهواء', 'مجموعة دعامات رياضية', 'تلفزيون LG OLED', 
            'شاحن موبايل سريع', 'كاميرا دافينشي 6K', 'موتور كهربائي', 'سماعات هيدفون سوني', 'مبرد هواء محمول',
            'وحدة تخزين متنقلة', 'طاولة طعام خشبية', 'كراسي طعام ذات تصميم عصري', 'خلاط ماء', 'شاحن لاسلكي للسيارة',
            'أكواب كوفي ذات تصاميم حديثة', 'سماعات رياضية فيليبس', 'سروال رياضي أديداس', 'خزانة تنظيم المطبخ',
            'جهاز استشعار الحركة', 'مبرد هواء لوح رقائقي', 'مروحة تبريد', 'مفاتيح كهربائية آمنة', 
            'سخانات ماء كهربائية', 'مرآة LED', 'سلة مهملات ذكية', 'جهاز مساج كهربائي للرقبة',
            'محرك لافا', 'أجهزة كومبيوتر ألعاب', 'واقي شاشة هواتف', 'مضخة مياه كهربائية', 'ميزان قياس الوزن الذكي',
            'ميزان حرارة رقمي', 'شاحن لاسلكي للهاتف', 'ألعاب أكشن للأطفال', 'حقيبة سفر فاخرة', 'عطر هيرمس', 
            'فرشاة تنظيف سيشوار', 'غسالة ملابس سامسونج 10 كجم', 'مصباح مكتبي LED', 'غطاء وسادة من الحرير',
            'شاحن متنقل بقوة 20000 ملي أمبير', 'دراجة هوائية للسباقات', 'عجانة كهربائية', 'ألعاب فيديو للأطفال', 
            'زجاجة ماء رياضية', 'مكواة مكبوسة', 'معدات رياضية للصالة', 'طاولة خشبية مزدوجة', 'مساعد صوتي من جوجل',
            'كاميرا رقابية للمراقبة', 'جهاز تطهير الهواء', 'لابتوب لينوفو', 'سماعات بوست', 'قلم تابلت رقمي',
            'أدوات تعليمية للأطفال', 'جهاز عرض ليزر', 'أرفف تخزين للمطبخ', 'مصباح ليلي للأطفال', 
            'خلاط عميق لعصائر الفواكه', 'ألعاب تسلق الأطفال', 'طاولة دراسة للأطفال', 'كرسي مكتب مريح',
            'سكوتر كهربائي عائلي', 'ألعاب رياضية للأطفال', 'غسالة ملابس بوش', 'جهاز تحضير عصير',
            'ميكروويف سامسونج', 'أجهزة لياقة',
              'هاتف آيفون 15 برو', 'لابتوب ديل XPS 13', 'ساعة سامسونج جالكسي 6', 'سماعات آبل AirPods Pro',
              'تلفاز سامسونج 55 بوصة QLED', 'كاميرا كانون EOS 90D', 'ثلاجة هيتاشي 16 قدم', 
              'خلاط كهربائي كينوود', 'غسالة سامسونج أوتوماتيك 8 كجم', 'مكنسة دايسون V15', 
              'مكيف جنرال سبلت 24 وحدة', 'جهاز مشي فتنس 580', 'كرسي مكتب مريح Ergotune', 
              'طابعة HP DeskJet 2720', 'ماوس ريزر DeathAdder V2', 'كيبورد ميكانيكي HyperX', 
              'لابتوب ماك بوك برو M2', 'ميكروويف باناسونيك 25 لتر', 'غسالة صحون بيكو 6 برامج', 
              'جهاز الألعاب بلايستيشن 5', 'سماعات سوني WH-1000XM4', 'شاشة LG UltraGear 27 بوصة', 
              'طاولة مكتب حديثة', 'أريكة ثلاثية جلدية', 'طاولة قهوة زجاجية', 'مكتبة كتب خشبية', 
              'مجموعة أواني طهي', 'خلاط يدوي مولينكس', 'محضرة طعام براون', 'مكواة بخار فيليبس', 
              'مجموعة مستحضرات عناية بالبشرة', 'عطر شانيل بلو 100 مل', 'عطر ديور سوفاج 100 مل', 
              'ساعة رولكس كلاسيك', 'حقيبة ظهر سامسونايت', 'سوار ذكي شاومي مي باند 8', 
              'لعبة مونوبولي الأصلية', 'دراجة جبلية TREK', 'ملابس رياضية نايك للرجال', 
              'ملابس رياضية أديداس للنساء', 'حذاء رياضي بوما', 'شاشة ألعاب MSI 32 بوصة', 
              'لوحة فنية ديكورية', 'جهاز تنظيف بالبخار كارشر', 'مجموعة أقلام خط عربي', 
              'مجموعة ألوان مائية احترافية', 'مكبر صوت JBL Charge 5', 'لوحة شحن لاسلكية بلوجي', 
              'خيمة تخييم عائلية', 'كاميرا مراقبة هيك فيجن', 'جهاز بصمة الحضور', 
              'مجموعة شواحن سريعة لجميع الأجهزة', 'كرسي ألعاب DXRacer', 'مكتب أطفال متعدد الاستخدام', 
              'ساعة يد كاسيو كلاسيكية', 'مبخرة إلكترونية بتصميم حديث', 'مكنسة روبوت ذكية', 
              'شاشة سامسونج OLED 4K', 'حقيبة لابتوب بيلكين', 'كاميرا ويب لوجيتك C920', 
              'مبرد مائي للمعالج كورسير', 'وحدة تخزين خارجي WD 4TB', 'أقراص SSD سامسونج 1TB', 
              'سماعات جيمينج كروسير HS80', 'كابل شحن سريع أنكر', 'ماكينة صنع القهوة نسبرسو', 
              'آلة صنع الفشار المنزلية', 'مبرد مياه كولين', 'خزانة أحذية حديثة', 'طقم سرير مزدوج', 
              'مرآة ديكور بالحائط', 'مجموعة تمارين مقاومة', 'دراجة كهربائية صغيرة', 'مكبر صوت للمساجد', 
              'شاشة تعمل باللمس HP', 'مجموعة عدسات للهواتف الذكية', 'أغطية هاتف مرنة', 
              'حذاء تنس رياضي فيلا', 'كابلات HDMI فائقة الجودة', 'مبرد سيارة متنقل', 
              'ماكينة حلاقة رجالية فيليبس', 'فرشاة تنظيف كهربائية للوجه', 'ألعاب تعليمية للأطفال', 
              'مجموعة دمى باربي', 'مسجل صوت رقمي', 'سخان ماء فوري', 'ساعة سيكو أوتوماتيكية', 
              'منظار رؤية ليلية', 'ميزان رقمي للمطبخ', 'كوب حافظ للحرارة', 'مظلة شمسية مقاومة للرياح', 
              'طقم سفرة من 24 قطعة', 'كرسي أطفال للسيارة', 'مجموعة كراسي خشبية', 'كاميرا تصوير تحت الماء', 
              'مرطب هواء ذكي', 'مشغل أقراص بلوراي', 'رفوف تخزين معدنية', 'جهاز فاكس حديث', 
              'مستشعر إضاءة ذكي', 'مجموعة شفرات حلاقة نسائية', 'كرسي هزاز خشبي', 'آلة عجن خبز أوتوماتيكية', 
              'خلاط عصير محمول', 'طقم مقالي غير لاصقة', 'دفاية كهربائية صغيرة', 'مجموعة مستلزمات حمام',
              'خزانة ملابس خشبية', 'لوحة مفاتيح لوجيتك', 'خلاط كينوود', 'غسالة صحون LG', 'حقيبة يد بربري', 
              'ماكينة تحضير القهوة بريفيل', 'شاشة سامسونج 32 بوصة', 'حقيبة سفر ترافل', 'ساعة فيتبيت سبورت', 
              'حذاء رياضي نايك', 'محفظة جلدية تومي هيلفيغر', 'سماعة بلوتوث سامسونج', 'خلاط يدوي فيليبس', 
              'طاولة قهوة مع كراسي', 'شاشة عرض سامسونج 4K', 'قارب زوارق قابل للنفخ', 'سكوتر كهربائي Xiaomi',
              'طابعة صور فوجي فيلم', 'ميكروويف ميديا', 'موتوسيكل هوندا CRF450R', 'هاتف سامسونج جالكسي S23',
              'مكيف هواء توشيبا', 'جهاز جيمينج XBOX Series X', 'كاميرا ديجيتال سوني', 'خيمة تخييم صغيرة', 
              'ساعة ذكية سامسونج جالكسي واتش 6', 'شاشة LED 4K', 'مجموعة أدوات عناية بالشعر', 
              'مظلة شمسية سميكة', 'جهاز تنقية الهواء', 'مجموعة دعامات رياضية', 'تلفزيون LG OLED', 
              'شاحن موبايل سريع', 'كاميرا دافينشي 6K', 'موتور كهربائي', 'سماعات هيدفون سوني', 'مبرد هواء محمول',
              'وحدة تخزين متنقلة', 'طاولة طعام خشبية', 'كراسي طعام ذات تصميم عصري', 'خلاط ماء', 'شاحن لاسلكي للسيارة',
              'أكواب كوفي ذات تصاميم حديثة', 'سماعات رياضية فيليبس', 'سروال رياضي أديداس', 'خزانة تنظيم المطبخ',
              'جهاز استشعار الحركة', 'مبرد هواء لوح رقائقي', 'مروحة تبريد', 'مفاتيح كهربائية آمنة', 
              'سخانات ماء كهربائية', 'مرآة LED', 'سلة مهملات ذكية', 'جهاز مساج كهربائي للرقبة',
              'محرك لافا', 'أجهزة كومبيوتر ألعاب', 'واقي شاشة هواتف', 'مضخة مياه كهربائية', 'ميزان قياس الوزن الذكي',
              'ميزان حرارة رقمي', 'شاحن لاسلكي للهاتف', 'ألعاب أكشن للأطفال', 'حقيبة سفر فاخرة', 'عطر هيرمس', 
              'فرشاة تنظيف سيشوار', 'غسالة ملابس سامسونج 10 كجم', 'مصباح مكتبي LED', 'غطاء وسادة من الحرير',
              'شاحن متنقل بقوة 20000 ملي أمبير', 'دراجة هوائية للسباقات', 'عجانة كهربائية', 'ألعاب فيديو للأطفال', 
              'زجاجة ماء رياضية', 'مكواة مكبوسة', 'معدات رياضية للصالة', 'طاولة خشبية مزدوجة', 'مساعد صوتي من جوجل',
              'كاميرا رقابية للمراقبة', 'جهاز تطهير الهواء', 'لابتوب لينوفو', 'سماعات بوست', 'قلم تابلت رقمي',
              'أدوات تعليمية للأطفال', 'جهاز عرض ليزر', 'أرفف تخزين للمطبخ', 'مصباح ليلي للأطفال', 
              'خلاط عميق لعصائر الفواكه', 'ألعاب تسلق الأطفال', 'طاولة دراسة للأطفال', 'كرسي مكتب مريح',
              'سكوتر كهربائي عائلي', 'ألعاب رياضية للأطفال', 'غسالة ملابس بوش', 'جهاز تحضير عصير',
              'ميكروويف سامسونج', 'أجهزة لياقة بدنية',
                'محمصة قهوة حديثة', 'جهاز استقبال دي في دي', 'شاشة عرض 43 بوصة 4K', 'أداة تنظيف الذاكرة', 
                'مفرمة لحم كهربائية', 'ثلاجة بوش 18 قدم', 'قلم طباعة ثلاثي الأبعاد', 'كرسي مساج كهربائي', 
                'كلاسيك شيشة إلكترونية', 'سماعة بلوتوث JBL', 'جهاز تسجيل الصوت المحمول', 'منبه ذكي', 
                'دراجة هوائية كينغتاون', 'حزام أمان للأطفال', 'عدسات مكبرة', 'سماعات رياضية أندر آرمور', 
                'مكيف هواء متنقل', 'كابل USB-C', 'طابعة ليزر مونوكروم', 'مراوح كهربائية صغيرة', 
                'تلفزيون 70 بوصة ألترا إتش دي', 'كاميرا مدمجة سوني', 'أداة لتنظيف المكواة', 'جهاز قياس درجة الحرارة',
                'منظف للأرضيات', 'مفتاح إنترنت لاسلكي', 'مفرش سرير فاخر', 'مكيف مركزي', 'كاميرا مراقبة لاسلكية',
                'دواسة كهربائية للقدمين', 'جهاز لعمل المثلجات', 'مستشعر حركة ذكي', 'ميزان رقمي للملابس',
                'خلاط طعام مع ملحقات', 'مبرد مياه سوني', 'شاحن سيارة سريع', 'أداة تنظيف الأثاث', 'صندوق تخزين معدني', 
                'مرطب هواء للمكتب', 'لعبة تعليمية للأطفال', 'شاحن موبايل متعدد', 'طاولة الطعام المعدني', 
                'كاميرا مراقبة في الهواء الطلق', 'هاتف جوال رخيص', 'كاميرا مراقبة أمنية داخلية', 'أداة استشعار الغاز', 
                'محرر نصوص للكود البرمجي', 'معدات رياضية في الهواء الطلق', 'محول طاقة السيارة', 'مزيل طلاء الأظافر',
                'مكنسة هوائية ذكية', 'جهاز طباعة الصور المحمولة', 'شاشة عرض للألعاب', 'حقيبة لاب توب فاخرة',
                'ألعاب متاهة للأطفال', 'مشغل موسيقى محمول', 'غسالة صحون مدمجة', 'مساعد جوجل الذكي', 'ساعة ذكية رياضية',
                'مكتبة حائط مع رفوف', 'مروحة سقف ذكية', 'آيباد برو 12.9 بوصة', 'جهاز تقوية الإشارة اللاسلكية',
                'لوحة شحن للهاتف المحمول', 'عصارة فواكه كهربائية', 'قضيب إضاءة LED', 'ماكينة حلاقة للرجال', 
                'شاشة عرض متصلة بالإنترنت', 'طاولة لوحي متعددة الاستخدامات', 'غسالة اتوماتيكية هيتاشي',
                'مكواة بخار براون', 'مكنسة هوائية للسيارة', 'مبرد مياه أكتيف', 'شاحن للطوارئ', 'خزانة أدوية',
                'سماعة رأس لاسلكية', 'شاشة قياس السمك', 'جهاز مساج الرقبة', 'ثلاجة مشروبات صغيرة', 'طابعة ملونة',
                'تلفزيون OLED سامسونج', 'مضخة هواء للرياضات المائية', 'جهاز لياقة بدنية منزلي', 'مضاد للأشعة فوق البنفسجية',
                'محرر صور فوتوشوب', 'ترموستات ذكي', 'منظم أسلاك', 'أداة إزالة الشعر الكهربائية', 'مقلاة هوائية حديثة', 
                'ساعة يد فاخره', 'قفل ذكي للبناية', 'نظام موسيقي منزلي', 'زجاجة ماء ذات شاشة رقمية', 
                'شاحن ذكي للهاتف', 'مبرد ماء في سيارة', 'عدسات كاميرا أكشن', 'جهاز رسم كهربائي', 'شاحن للهواتف الذكية', 
                'مرايا أفقية كهربائية', 'معدات مكياج إلكترونية', 'كاميرا تحت الماء احترافية', 'إضاءة ليلية للمكتب', 
                'مكبر صوت تقليدي', 'جهاز تدفئة سريع للغرف', 'محفظة للهاتف المحمول', 'دراجة كهربائية صغيرة', 
                'جهاز تعقيم معقم الهواء', 'عدسات مكبرة لتكبير الصورة', 'بطارية شحن 10000 ملي أمبير', 'جهاز لعمل الجبن',
                'جهاز تصفية هواء', 'محفظة بطاقات بلاستيكية', 'حقيبة كاميرا مقاومة للماء', 'ترمومتر الكتروني', 
                'غسالة يدوية صغيرة', 'شاحن شمسيا للطوارئ', 'شاحن كهربائي لاسلكي', 'مكينة صنع القهوة المنزلي',
                'جهاز تصحيح الذاكرة', 'مرشحات الماء للمنزل', 'خزان مياه كهربائي', 'مكينة فرم اللحم', 
                'عربة تسوق قابلة للطي', 'دش شاور ذكي', 'مكبر صوت بلوتوث سوني', 'مظلة شمسية أفقية', 'سماعة رأس جيمينج',
                'مكينة طباعة الصور المحمولة', 'مزيل الروائح الكهربائية', 'أداة تنظيف المطبخ', 'مبرد جوي للجهاز',
                'هاتف محمول بتصميم فريد', 'مزيل طلاء أظافر طبيعي', 'شاشة هاتف مزدوجة', 'جهاز كهربائي للياقة البدنية', 
                'طاولة طعام خشبية مودرن', 'أداة تفتيح البشرة', 'آلة صنع البوظة المنزلية', 'جهاز تقويم الأسنان',
                'محطة شحن لاسلكية', 'غسالة صحون صغيرة', 'جهاز تدليك للأقدام', 'جهاز استشعار درجة الحرارة', 
                'منظف سطح الكمبيوتر', 'منتج لتمارين المقاومة', 'ماكينة قص الشعر الاحترافية', 'آلة قياس الضغط',
                'جهاز تنظيف أسطح المطبخ', 'موزع ماء ذكي', 'قناع النوم الذكي', 'طابعة فواتير حرارية', 'جهاز رياضي متعدد الاستخدامات'
            
            
            ];
        $products = [];
        for ($i = 0; $i < 500; $i++) {
            $title = $productTitles[$i];
            $category_id = $categories[(int)($i / 10) % count($categories)];
            $brand_id = $brands[array_rand($brands)];
            $price = rand(50, 5000);
            $discount = rand(0, 50);
            $quantity = rand(1, 100);

            $products[] = [
                'title' => $title,
                'slug' => (string)rand(0,23434324).Str::slug($title, '-').(string)rand(0,23434324),
                'description' => 'هذا المنتج يقدم أفضل الحلول لاحتياجاتك اليومية.',
                'content' => 'تفاصيل مميزة عن المنتج: ' . $title,
                'image' => 'product_' . rand(1, 10) . '.png',
                'price' => $price,
                'quantity' => $quantity,
                'status' => (string)rand(0, 1),
                'category_id' => $category_id,
                'brand_id' => $brand_id,
                'admin_id' => 1,
            ];
        }

        DB::table('products')->insert($products);
    }
}