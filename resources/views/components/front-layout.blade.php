<!DOCTYPE html>
<html class="no-js">

<head> 
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>متجر-{{$title}} </title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/assets/images/favicon.svg')}}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap_ar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/assets/css/LineIcons.3.0.css')}}" />
    <link rel="stylesheet" href="{{asset('front/assets/css/tiny-slider_ar.css')}}" />
    <link rel="stylesheet" href="{{asset('front/assets/css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front/assets/css/main_ar.css')}}" />
    @stack('css')
    <style>
.direction_rtl{
    direction:rtl;
}
</style>
</head>
<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area direction_rtl">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                      
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="{{route('home')}}">صفحة رئيسية</a></li>
                                <li><a href="{{route('front.about_us')}}"> عنا</a></li>
                                <li><a href="{{route('front.contact_us')}}">طلب التواصل</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <ul class="user-login">
                                @if($islogin)
                                @if($userType=='admin')
                                <li>
                                    <a href="{{route("admin.dashboard")}}"><i  class="fab fa-edit">لوحة التحكم</a>
                                </li>
                                @else
                                <li>
                                    <a href=""><i class="fab fa-user">ملف الشخصي </i></a>
                                </li>
                                @endif
                                <li>
                                <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                    <button  href="{{ route('logout') }}" style="    color: #fff;
                                    font-weight: 500;
                                    border:none;
                                    background:none;
                                    font-size: 14px;
                                    white-space: nowrap;"><i class="bx bx-log-out"></i>
                                        <i class="fa fa-sign-out fa-lg"></i>تسجيل الخروج</button>
                                </form>
                                </li>
                            </ul>
                            @else
                            <ul class="user-login">
                                <li>
                                    <a href="{{route("login")}}">دخول </a>
                                </li>
                                <li>
                                    <a href="{{route('register')}}">تسجيل  جديد</a>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{asset($setting->logo)}}" alt="Logo"  width="83px">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>كل</option>
                                            <option value="1">منتجات</option>
                                            <option value="2">اقسام</option>
                                            <option value="3">وسوم</option>
                                            <option value="4">طلبات</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="بحث">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>رقم تواصل:
                                    <span>{{$setting->whatsapp}}</span>
                                </h3>
                            </div>
                            @if($userType!='admin')
                            <div class="navbar-cart">
                             
                              <x-cart-menu/>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i> اقسام</span>
                            <ul class="sub-category">
                                @foreach ($cats as $cat)
                                <li><a href="{{route('front.products.category',$cat->id)}}">{{$cat->name}}</a>
                                     @if($cat->children()->first())
                                     <i class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        @foreach ($cat->children as $children)
                                        <li><a href="{{route('front.products.category',$cat->id)}}">{{$children->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item ">
                                        <a class="@if($url=='/') active @endif" href="{{route('home')}}" aria-label="Toggle navigation">صفحة رئيسية</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu @if($url=='about_us' || $url=='faqs') active @endif collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-2"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">صفحات</a>
                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item"><a class=" @if($url=='about_us') active @endif" href="{{route('front.about_us')}}">عنا</a></li>
                                            <li class="nav-item"><a class=" @if($url=='faqs') active @endif" href="{{route('front.faqs')}}">اسئلة الشائعة</a></li>
                                          @if(!auth()->guard('web')->check() and !auth()->guard('admin')->check())
                                            <li class="nav-item "><a class=" @if($url=='login') active @endif" href="{{route('login')}}">دخول</a></li>
                                            <li class="nav-item"><a class=" @if($url=='register') active @endif" href="{{route('register')}}">تسجيل مستخدم</a></li>
                                        @endif
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">متجر</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a href="{{route('front.products')}}"> منتجات شبكة</a></li>
                                            <li class="nav-item"><a href="{{route('front.shop_list')}}"> منتجات احادي</a></li>
                                            <li class="nav-item"><a href="{{route('front.card')}}">سلة</a></li>
                                            @if($userType=='web')
                                            <li class="nav-item"><a href="{{route('front.orders')}}">طلبات</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" @if($url=='/contact-us') active @endif" href="{{route('front.contact_us')}}" aria-label="Toggle navigation">طلب التواصل</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">تابعنا:</h5>
                        <ul>
                            <li>
                                <a href="{{$setting->facebook}}"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="{{$setting->twiter}}"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="{{$setting->instagram}}"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="{{$setting->skyp}}"><i class="lni lni-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    {{$slot}}
    
    <!-- Start Footer Area -->
    <footer class="footer direction_rtl">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="{{route('home')}}">
                                    <img src="{{asset($setting->logo)}}" alt="#" width="83px">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                   اشترك معنا في النشرة البريدية
                                    <span>معرفة المنتجات الجديدة واحدث العروض اشترك معنا في النشرة البريدية</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="  ادخل ايميلك..." type="email">
                                        <div class="button">
                                            <button class="btn">اشترك<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>ابقي علي تواصل معنا</h3>
                                <p class="phone">رقم الجوال:{{$setting->phone_number}}</p>
                                <ul>
                                    <li><span>الاثنين-الجمعه: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>السسبت: </span> 10.00 am - 6.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:support@shopgrids.com">{{$setting->gmail}}</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>متوفر مجترنا علي تطبيقات الجوال</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title"> حمله الان  </span>
                                            <span class="big-title"> للايفون</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">  حمله الان</span>
                                            <span class="big-title">الاندرويد</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>صفحات</h3>
                                <ul>
                                    <li><a href="{{route('front.contact_us')}}">عنا</a></li>
                                    <li><a href="{{route('front.contact_us')}}">طلب تواصل</a></li>
                                    <li><a href="{{route('front.faqs')}}">اسئلة شائعة</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>اقسام </h3>
                                <ul>
                                    @foreach ($cats->take(5) as $cat)
                                    <li><a href="javascript:void(0)">{{$cat->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>وسائل الدفع داخل الموقع:</span>
                                <img src="{{asset('assets/credit-cards-footer.png')}}" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>تم برمجه الموقع بواسطة<a href="https://wajeehayube.com/" rel="nofollow"
                                        target="_blank">وجيه أيوب</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>تابعنا علي مواقع التواصل:</span>
                                </li>
                                <li><a href="{{$setting->facebook}}" target="_blank"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="{{$setting->twiter}}" target="_blank"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="{{$setting->instagram}}" target="_blank"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="{{$setting->gmail}}" target="_blank"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
    <!-- ========================= JS here ========================= -->
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('front/assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
    
    @include('sweetalert::alert')
    
    @stack('scripts')
</body>

</html>