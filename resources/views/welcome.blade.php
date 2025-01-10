<x-front-layout title="Home - ShopGrids Bootstrap 5 eCommerce HTML Template.">
    <style>
.col-lg-3{
    width: 24%;
}


</style>
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('{{asset("assets/products/".$productsRight->image)}}');">
                                <div class="content">
                                    <h2>
                                        <span>منتج جديد</span>
                                        {{$productsRight->title}}
                                    </h2>
                                    <h3>${{$productsRight->price}}</h3>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>منتجات حصرية</h2>
                                    <p>تصفح وتابع العروض اولا باول في متجرك الخاص</p>
                                    <div class="button">
                                        <a class="btn" href="{{route('front.products')}}">تسوق الان</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                        @foreach ($productsLeft as $productleft)
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url({{asset('assets/products/'.$productleft->image)}});">
                                <div class="content">
                                    <h2><span>No restocking fee ($35 savings)</span>
                                       {{$productleft->title}}
                                    </h2>
                                    <p>{{$productleft->description}}</p>
                                    <h3><span>Now Only</span> ${{$productleft->price}}</h3>
                                    <div class="button">
                                        <a href="{{route('front.products.show',$productleft->slug)}}" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Slider -->
                
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->
    <!-- Start Featured Categories Area -->
    <section class="featured-categories section direction_rtl">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>أقسام</h2>
                        <p>كل منتج يتكون من عدد من الاقسام تصفح القسم الذي يلبي رغباتك
                            
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories->take(9) as $category)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">{{$category->name}}</h3>
                        <ul>
                            @foreach ($category->children as $children)
                            <li><a href="{{route('front.products.category',$children->id)}}">{{$children->name}}</a></li>
                            @endforeach
                        </ul>
                        <div class="images">
                            <img src="{{asset('assets/brands/'.$category->image)}}" width="150px" height="119px" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Features Area -->
    <!-- Start Trending Product Area -->
    <section class="trending-product section direction_rtl">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>اعلي المنتجات</h2>
                        <p>نعرض لك اكثر منتجات التي عليها وطلب وايضا تحتوي علي عروض لنجعل عملية تسوق سهلخ </p>
                    </div>
                </div>
            </div>
            <div class="row">`
                @foreach ($trendsProduct as $trendProduct)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product" style="height:414px">
                        <div class="product-image">
                            <img src="{{asset('assets/products/'.$trendProduct->image)}}" alt="#" height="214px">
               
                             @if($trendProduct->discount!=null)
                            <span class="sale-tag">{{$trendProduct->discount->discount}}
                                @if($trendProduct->discount->discound_type=='fixied')
                                $
                            @else
    %
                            @endif
                            </span>
                            @endif
                            <div class="button">
                                <form method="post" action="{{route('front.card.add',$trendProduct->id)}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$trendProduct->id}}"/>
                                    <input type="hidden" name="price" value="{{$trendProduct->price}}"/>
                                <button  class="btn" style="width:162px"><i class="lni lni-cart"></i>اضافة الي سلة  </button>
                                </form>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">{{$trendProduct->category->name}}</span>
                            <h4 class="title">
                                <a href="{{route('front.products.show',$trendProduct->slug)}}">{{$trendProduct->title}}</a>
                            </h4>
                            <ul class="review">
                                @if(!$trendProduct->rattings->isEmpty())
                                    <x-ratting  :ratting="$trendProduct->product_ratting"/>
                                        <li><span>{{$trendProduct->product_ratting}} Review(s)</span></li>
                                    @else
                                    لا يوجد تقييم
                                    @endif
                            </ul>
                            <div class="price">
                                @if($trendProduct->discount!=null)

                                <span>${{$trendProduct->discount_data}}</span>
                                <span class="discount-price">{{$trendProduct->price}}</span>
                                @else
                                <span>{{$trendProduct->price}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <section class="home-product-list section direction_rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">اكثر منتجات مبيعا</h4>
                    <!-- Start Single List -->
                    @foreach ($bestsSellers as $bestSellers)
                    <div class="single-list">
                        <div class="list-image">
                            <a href="{{route('front.products.show',$bestSellers->slug)}}"><img src="{{asset('assets/products/'.$bestSellers->image)}}" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="{{route('front.products.show',$bestSellers->slug)}}">{{$bestSellers->title}}r</a>
                            </h3>
                            <span>${{$bestSellers->price}}</span>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single List -->
                </div>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">منتجات حديثة </h4>
                    <!-- Start Single List -->
                    @foreach ($newsProducts as $newProducts)
                    <div class="single-list">
                        <div class="list-image">
                            <a href="{{route('front.products.show',$newProducts->slug)}}"><img src="{{asset('assets/products/'.$newProducts->image)}}" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="{{route('front.products.show',$newProducts->slug)}}">{{$newProducts->title}}</a>
                            </h3>
                            <span>${{$newProducts->price}}</span>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single List -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <h4 class="list-title">منتجات اعلي تقييم </h4>
                    <!-- Start Single List -->
                    @foreach ($topsratted as $topratted)
                        
                    <div class="single-list">
                        <div class="list-image">
                            <a href="{{route('front.products.show',$topratted->slug)}}"><img src="{{asset('assets/products/'.$topratted->image)}}" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="{{route('front.products.show',$topratted->slug)}}">{{$topratted->title}}</a>
                            </h3>
                            <span>${{$topratted->price}}</span>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single List -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Home Product List -->

    <!-- Start Brands Area -->
    <div class="brands">
        <div class="container">
            <div class="row">
             
                <div class="section-title">
                    <h2> اشهر العلامات التجارية</h2>
                    <p>نعرض لك ابرز  علامتا التجارية  </p>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                    @foreach ($brands as $brand)
                    <div class="brand-logo">
                        <img src="{{asset('assets/brands/'.$brand->image)}}" alt="#">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Brands Area -->
    <!-- Start Shipping Info -->
    <section class="shipping-info direction_rtl">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>تسوق مجاني </h5>
                        <span>نوفر لك كل ما يلزم لتجربة رائعة</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 دعم فني.</h5>
                        <span>مستعدون لاجابة علي اسئلتكم </span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5> دفع الالكتروني.</h5>
                        <span>نوفر طرق عديد بدفع الالكتروني .</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5> مرتجعات</h5>
                        <span>عملية اعداة المنتج مجانيه</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    @push('scripts')
<script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 152,
            rtl: true,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });

    </script>



    @endpush
</x-front-layout>