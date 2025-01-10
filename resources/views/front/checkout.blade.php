<x-front-layout title="عملية دفع">
    <x-slot:breadcrumb>
        <div class="breadcrumbs direction_rtl">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">عملية دفع</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> صفحة رئيسية</a></li>
                            <li>دفع</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>

    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section direction_rtl">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('front.checkout') }}" method="post" id="payment-form">
<input type="hidden" name="type" value="delivry">
                        @csrf
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">عنوان المستخدم</h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <label>اسم المستخدم</label>
                                                            <input type="text"  name="name" value="{{$user->name}}" placeholder=" Name"
                                                            class="form-control @if($errors->has('name')) is-invalid @endif" id="name" />
                                                            @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                     
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <label>ايميل</label>
                                                            <input type="email"  name="email" value="{{$user->email}}" placeholder=" Email"
                                                            class="form-control @if($errors->has('email')) is-invalid @endif" id="email" />
                                                            @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror  
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>رقم الجوال </label>
                                                    <div class="form-input form">
                                                        <input type="text"  name="phone_number" value="{{$user->phone}}" placeholder=" phone_number"
                                                        class="form-control @if($errors->has('phone_number')) is-invalid @endif" id="phone_number" />
                                                        @error('phone_number')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label> عنوان</label>
                                                    <div class="form-input form">
                                                        <input type="text"  name="street_address" value="{{$user->street_address}}" placeholder=" street_address"
                                                        class="form-control @if($errors->has('street_address')) is-invalid @endif" id="street_address"/>
                                                        @error('street_address')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>مدينة</label>
                                                    <div class="form-input form">
                                                        <input type="text"  name="city" value="{{$user->city}}" placeholder=" city"
                                                        class="form-control @if($errors->has('city')) is-invalid @endif" id="city"/>
                                                        @error('city')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Post Code</label>
                                                    <div class="form-input form">
                                                        <input type="text"  name="postal_code" value="{{$user->postal_code}}" placeholder=" postal_code"
                                                        class="form-control @if($errors->has('postal_code')) is-invalid @endif" id="postal_code"/>
                                                        @error('postal_code')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>منطقة</label>
                                                    <div class="select-items">
                                                        <input type="text"  name="state" value="{{$user->state}}" placeholder=" state"
                                                        class="form-control @if($errors->has('state')) is-invalid @endif" id="state"/>
                                                        @error('state')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>دولة</label>
                                                    <div class="form-input form">
                                                        {{-- <x-form.select name="addr[shipping][country]" :options="$countries" /> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-payment-option">
                                                    <h6 class="heading-6 font-weight-400 payment-title">اختر طريقة التوصيل مناسبة</h6>
                                                    <div class="payment-option-wrapper">
                                                        <div class="single-payment-option">
                                                            <input type="radio" name="shipping" checked id="shipping-1">
                                                            <label for="shipping-1">
                                                                <img src="https://via.placeholder.com/60x32" alt="Sipping">
                                                                <p>طريقة القياسية</p>
                                                                <span class="price">$10.50</span>
                                                            </label>
                                                        </div>
                                                        <div class="single-payment-option">
                                                            <input type="radio" name="shipping" id="shipping-2">
                                                            <label for="shipping-2">
                                                                <img src="https://via.placeholder.com/60x32" alt="Sipping">
                                                                <p>طريقة المفضلة</p>
                                                                <span class="price">$10.50</span>
                                                            </label>
                                                        </div>
                                                        <div class="single-payment-option">
                                                            <input type="radio" name="shipping" id="shipping-3">
                                                            <label for="shipping-3">
                                                                <img src="https://via.placeholder.com/60x32" alt="Sipping">
                                                                <p>Vip</p>
                                                                <span class="price">$10.50</span>
                                                            </label>
                                                        </div>
                                                        <div class="single-payment-option">
                                                            <input type="radio" name="shipping" id="shipping-4">
                                                            <label for="shipping-4">
                                                                <img src="https://via.placeholder.com/60x32" alt="Sipping">
                                                                <p>Standerd Shipping</p>
                                                                <span class="price">$10.50</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="steps-form-btn button">
                                                    <button class="btn btn-alt" type="submit">شراء</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                                </li>
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapsefive" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="col-12">
                    <form action="{{ route('front.checkout') }}" method="post" id="payment-form">
                        @csrf
<input type="hidden" name="type" value="visa">
                                            <div class="checkout-payment-form">
                                                <div class="single-form form-default">
                                                    <label>اسم</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Cardholder Name">
                                                    </div>
                                                </div>
                                                <div class="single-form form-default">
                                                    <label>اسم البطاقه</label>
                                                    <div class="form-input form">
                                                        <input id="credit-input" type="text"
                                                            placeholder="0000 0000 0000 0000">
                                                        <img src="assets/images/payment/card.png" alt="card">
                                                    </div>
                                                </div>
                                                <div class="payment-card-info">
                                                    <div class="single-form form-default mm-yy">
                                                        <label>تاريخ الانتهاء</label>
                                                        <div class="expiration d-flex">
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="MM">
                                                            </div>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="YYYY">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>CVC/CVV <span><i
                                                                    class="mdi mdi-alert-circle"></i></span></label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="***">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-form form-default button">
                                                    <button class="btn" type="submit">دفع الان</button>
                                                </div>
                                            </div>
                    </form>
                                        </div>
                                    </section>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar direction_rtl">
                      
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">جدول سعر</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">سعر النهائي:</p>
                                    <p class="price">{{$cart->total()}}</p>
                                </div>
                            </div>

                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">دفع</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>