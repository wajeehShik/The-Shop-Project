<x-front-layout title="سلة">

    <style>
        .title-product{
            position: relative;

        }
        .box-head{
            position: absolute;
    right: 0;
    top: 24px;
    background: #bacdea;
    padding: -1px;
    border-radius: 10px;
    column-gap: 6px;
        }
        .box-head .box{
            border-right: 2px solid white;
            padding: 5px;
        }
        .box-head .box:last-child {
    border: none;
}
    </style>
    <x-slot:breadcrumb>
        <div class="breadcrumbs direction_rtl">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">سلة</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{route('home')}}"><i class="lni lni-home"></i> صفحة رئيسية</a></li>
                            <li>سلة</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>
    <!-- Shopping Cart -->
    <div class="shopping-cart section direction_rtl">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>المنتج </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>كمية</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>سعر</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>اجمالي سعر</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>حذف</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                @foreach ($cart->get() as $item)

                <!-- Cart Single List list -->
                <div class="cart-single-list hover" id="{{ $item->id }}">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="{{ route('front.products.show', $item->products->slug) }}">
                                <img src="{{ $item->products->image_url }}" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12 title-product">
                            <h5 class="product-name"><a href="{{ route('front.products.show', $item->products->slug) }}">
                                    {{ $item->products->title }}</a>
                                </h5>
                            <p class="product-des">
                                <span><em>Type:</em> {{$item->products->category->name}}</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                <input type="number" class="form-control item-quantity" data-id="{{ $item->id }}"  value="{{ $item->qunatity }}">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            @if($item->products->discount!=null )
                            <p class="price">${{$item->products->discount_data}}</p>
                            <p><span style="
                                text-decoration: line-through;">${{$item->products->price}}</span></p>
                            @else
                            <p>{{ $item->products->price}}</p>
                            @endif
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 ">
                            <p id="total-{{$item->id}}">{{$item->qunatity * $item->products->price }}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" data-id="{{ $item->id }}" href="javascript:void(0)"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single List list -->
                @endforeach
            </div>
            <div class="row " >
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li >اجمالي سلة <span id="total">{{$cart->total()}}</span></li>
                                        <li>تسوق<span>Free</span></li>
                                        <li>رصيدك<span>$00.00</span></li>
                                        <li class="last">سوف تدفع<span>${{$cart->total()}}.00</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('front.checkout')}}" class="btn">دفع</a>
                                        <a href="{{route('front.products')}}" class="btn btn-alt">اكمال التسوق</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
    <script src="{{asset('dashbord_style/js/jquery-3.3.1.min.js')}}"></script>
    <script>
        const csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('frontend/js/card.js') }}"></script>

</x-front-layout>