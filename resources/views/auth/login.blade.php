<x-front-layout>  <!-- Start Breadcrumbs -->
    <div class="breadcrumbs direction_rtl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">تسجيل الدخول</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> صفحة رئيسية</a></li>
                        <li>تسجيل الدخول</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Login Area -->
    <div class="account-login section direction_rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3> تسجيل الدخول</h3>
                                <p>نوفر لك ايضا تسجيل عن طريق مواقع التواصل الالكتروني.</p>
                            </div>
                            <div class="social-login">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn"
                                            href="javascript:void(0)"><i class="lni lni-facebook-filled"></i>فيس بوك 
                                            </a></div>
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn"
                                            href="javascript:void(0)"><i class="lni lni-twitter-original"></i> تويتر
                                            </a></div>
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn"
                                            href="javascript:void(0)"><i class="lni lni-google"></i> جوجل </a>
                                    </div>
                                </div>
                            </div>
                            <div class="alt-option">
                                <span>او</span>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">ايميل</label>
                                <input class="form-control" type="email" id="reg-email" name="email" required>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">كلمة السر</label>
                                <input class="form-control" type="password" id="reg-pass" name="password" required>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1" name="remember">
                                    <label class="form-check-label">تذكرني</label>
                                </div>
                                <a class="lost-pass" href="{{ route('password.request') }}">هل نسيت كلمة السر</a>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">تسجيل</button>
                            </div>
                            <p class="outer-link">هل ليس لديك حساب <a href="{{route('register')}}">سجل الأن </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>