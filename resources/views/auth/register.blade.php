<x-front-layout title="تسجيل مستخدم">
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs direction_rtl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">تسجيل جديد</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> صفحة رئيسية</a></li>
                        <li>تسجيل مستخدم</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Register Area -->
    <div class="account-login section direction_rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>لا تمتلك حساب سجل الان</h3>
                            <p>سجل في موقعنا لتحصل علي امتع تجربة تسوق وتتصفح احدث العروض.</p>
                        </div>
                        <form class="row" method="post" action="register">
                          @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn"> اسم اول</label>
                                    <input class="form-control  @error('first_name') is-invalid @enderror"  type="text" value="{{old("first_name")}}" id="reg-fn" name="first_name" required>
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-ln"> اسم اخير</label>
                                    <input class="form-control @error('last_name') is-invalid @enderror" value="{{old("last_name")}}" type="text" id="reg-ln" name="last_name" required>
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">ايميل</label>
                                    <input class="form-control  @error('email') is-invalid @enderror" value="{{old("email")}}" type="email" id="reg-email" name="email" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-phone"> رقم الجوال</label>
                                    <input class="form-control  @error('phone') is-invalid @enderror" value="{{old("phone")}}"  type="text" id="reg-phone" name="phone" required>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">كلمة السر</label>
                                    <input class="form-control  @error('password') is-invalid @enderror" type="password" id="reg-pass" name="password" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">تاكيد كلمة السر </label>
                                    <input class="form-control   @error('password') is-invalid @enderror" type="password" id="reg-pass-confi" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">سجل </button>
                            </div>
                            <p class="outer-link">هل تمتلك حساب؟ <a href="{{route('login')}}"> دخول</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->

</x-front-layout>