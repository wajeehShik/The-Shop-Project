<x-front-layout title="طلباتي ">
    <style>
    .star-rating {
        direction: ltr; /* لجعل النجوم من اليمين لليسار */
        display: inline-block;
        font-size: 2rem;
        position: relative;
    }
    
    .star-rating input {
        display: none;
    }
    
    .star-rating label {
        color: #ccc;
        cursor: pointer;
        font-size: 2rem;
        position: relative;
    }
    
    .star-rating label:before {
        content: '\2605'; /* رمز النجمة */
        position: relative;
    }
    
    .star-rating input:checked ~ label {
        color: #ffca08; /* لون النجوم عند الاختيار */
    }
    
    .star-rating input:hover ~ label {
        color: #ffc107; /* لون النجوم عند التمرير */
    }
    
    .star-rating label:hover ~ label {
        color: #ffc107; /* تغيير اللون أثناء التمرير */
    }
    
    </style>
        <x-slot:breadcrumb>
            <div class="breadcrumbs direction_rtl">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="breadcrumbs-content">
                                <h1 class="page-title">طلباتي</h1>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <ul class="breadcrumb-nav">
                                <li><a href="{{route("home")}}"><i class="lni lni-home"></i> صفحة رئيسية</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot:breadcrumb>
    
        <section class="checkout-wrapper section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                @foreach ($orders as $order)
                                    
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">Order Number {{$order->id}} </h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                      <div class="row">
                                        <div class="cart-list-head">
                                            <!-- Cart List Title -->
                                            <div class="cart-list-title">
                                                <div class="row">
                                                    <div class="col-lg-1 col-md-1 col-12">
                            
                                                    </div>
                                                    <div class="col-lg-4 col-md-3 col-12">
                                                        <p>اسم منتج</p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <p>كمية</p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <p>سعر</p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <p>خصم</p>
                                                    </div>
                                                    <div class="col-lg-1 col-md-2 col-12">
                                                        <p>الحالة</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Cart List Title -->
                                            @foreach ($order->products as $product)
                                            <!-- Cart Single List list -->
                                            <div class="cart-single-list" id="{{ $product->id }}">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-1 col-md-1 col-12">
                                                        <a href="{{ route('front.products', $product->name) }}">
                                                            <img src="{{ $product->image_url }}" alt="#"></a>
                                                    </div>
                                                    <div class="col-lg-4 col-md-3 col-12">
                                                        <h5 class="product-name"><a href="{{ route('front.products', $product->name) }}">
                                                                {{ $product->name }}</a></h5>
                                                        <p class="product-des">
                                                            <span><em>نوع:</em> {{$product->category->name}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <div class="count-input">
                                                            <span>{{ $product->quantity }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <p>{{$product->quantity * $product->price }}</p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                        <p>{{ 0}}</p>
                                                    </div>
                                                    <div class="col-lg-1 col-md-2 col-12 d-flex">
                                                        @if($product->order_item['is_ratting']=='0')
                                                        <form action="{{route('front.ratting')}}" method="POST">
                                                            @csrf
                <a class="modal-effect btn btn-sm  start-review" data-effect="effect-scale" data-product-id="{{ $product->id }}" data-order-id="{{$order->id}}" data-toggle="modal" id="showDeleteModelSupervisors" href="javascript:void(0)">تقييم</a>
                                                   @elseif($product->order_item['is_ratting']=='1')
                                                   <x-ratting  :ratting="$product->product_ratting"/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single List list -->
                                            @endforeach
                                        </div>
                                      </div>
                                    </section>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                 
                </div>
            </div>
        </section>
        <div class="modal fade" id="deleteCoateoryModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{route('front.ratting')}}">
                    <div class="modal-body">
                        فثسف
                            @csrf
                            <input type="hidden" name="order_id" id="order_id">
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">reviw</label>
                                </div>
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="ratting" value="5">
                                    <label for="star5" title="5 stars"></label>
                                    <input type="radio" id="star4" name="ratting" value="4">
                                    <label for="star4" title="4 stars"></label>
                                    <input type="radio" id="star3" name="ratting" value="3">
                                    <label for="star3" title="3 stars"></label>
                                    <input type="radio" id="star2" name="ratting" value="2">
                                    <label for="star2" title="2 stars"></label>
                                    <input type="radio" id="star1" name="ratting" value="1">
                                    <label for="star1" title="1 star"></label>
                                </div>
                            </div>
                            <div class="row mt-3 g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">reviw</label>
                                </div>
                                <div class="col-auto">
                                    <textarea id="inputPassword6" name="note" class="form-control" required></textarea>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
        
                </div>
            </div>
        </div>
        
        @push('scripts')
        <script src="{{asset('dashbord_style/js/jquery-3.3.1.min.js')}}"></script>
        <script>
            $('body').on('click', '#showDeleteModelSupervisors', function() {
                var product_id = $(this).data('product-id');
                var order_id = $(this).data('order-id');
                $('#deleteCoateoryModel').modal('show');
                $('#product_id').val(product_id);
                $('#order_id').val(order_id);
               
    
            });
            </script>
        @endpush
    </x-front-layout>
    