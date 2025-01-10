<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RTL Slider</title>
    <!-- Tiny Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" />
    <!-- Bootstrap CSS (لتحسين التصميم) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        /* تهيئة اتجاه السلايدر */
        .slider-head {
            direction: rtl;
        }

        .tns-outer {
            direction: rtl !important;
        }

        .tns-slider {
            display: flex;
            flex-direction: row-reverse;
        }

        .tns-controls {
            direction: ltr;
        }

        .tns-prev {
            right: auto;
            left: 10px;
        }

        .tns-next {
            left: auto;
            right: 10px;
        }

        .tns-nav {
            direction: rtl;
            text-align: right;
        }
    </style>
</head>
<body>

<section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="slider-head">
                    <!-- Hero Slider -->
                    <div class="hero-slider">
                        <!-- Slide 1 -->
                        <div class="single-slider" style="background-image: url('https://via.placeholder.com/800x400');">
                            <div class="content text-white">
                                <h2><span>خصم خاص</span> منتج 1</h2>
                                <p>تفاصيل عن المنتج الأول.</p>
                                <h3><span>السعر الآن</span> $100</h3>
                                <div class="button">
                                    <a href="#" class="btn btn-primary">تسوق الآن</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="single-slider" style="background-image: url('https://via.placeholder.com/800x400');">
                            <div class="content text-white">
                                <h2><span>عرض جديد</span> منتج 2</h2>
                                <p>تفاصيل عن المنتج الثاني.</p>
                                <h3><span>السعر الآن</span> $150</h3>
                                <div class="button">
                                    <a href="#" class="btn btn-primary">تسوق الآن</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="single-slider" style="background-image: url('https://via.placeholder.com/800x400');">
                            <div class="content text-white">
                                <h2><span>فرصة ذهبية</span> منتج 3</h2>
                                <p>تفاصيل عن المنتج الثالث.</p>
                                <h3><span>السعر الآن</span> $200</h3>
                                <div class="button">
                                    <a href="#" class="btn btn-primary">تسوق الآن</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Small Banners -->
            <div class="col-lg-4 col-12">
                <div class="row">
                    <!-- Small Banner 1 -->
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="hero-small-banner" style="background-image: url('https://via.placeholder.com/400x200');">
                            <div class="content">
                                <h2><span>منتج إضافي</span> منتج 4</h2>
                                <h3>$50</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Small Banner 2 -->
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="hero-small-banner style2 bg-dark text-white">
                            <div class="content">
                                <h2>تخفيضات الأسبوع</h2>
                                <p>توفير حتى 50% على جميع المنتجات.</p>
                                <div class="button">
                                    <a class="btn btn-light" href="#">تسوق الآن</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tiny Slider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
<script>
    // تهيئة السلايدر
    tns({
        container: '.hero-slider',
        items: 1, // عدد العناصر المراد عرضها
  slideBy: 'page',
  autoplay: true,
  autoplayButtonOutput: false,
  controls: true, // عرض الأزرار
  nav: false, // إظهار النقاط
  rtl: true,
        controlsText: [
            '<i class="lni lni-chevron-left"></i>', 
            '<i class="lni lni-chevron-right"></i>'
        ],
    });
</script>

</body>
</html>