<x-front-layout>
      <!-- Start Breadcrumbs -->
      <div class="breadcrumbs direction_rtl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">منتجاتنا</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> صفحة رئيسية</a></li>
                        <li><a href="{{route('front.products')}}">متجر</a></li>
                        <li>منتجات شبكة</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Product Grids -->
    <section class="product-grids section direction_rtl">
        <div class="container">
            <div class="row">
             <x-sidebar-component/>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <label for="sorting">ترتيب بواسطة:</label>
                                        <select class="form-control" id="sorting">
                                            <option>منتجات المشهورة</option>
                                            <option>اعلي سعر</option>
                                            <option>اقل سعر</option>
                                            <option>سعر متوسط</option>
                                            <option>ترتيب تصاعدي</option>
                                            <option>ترتيب تنازلي</option>
                                        </select>
                                        <h3 class="total-show-product">عدد المنتجات المعروضه: <span>1 - 12 عنصر</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-grid" type="button" role="tab"
                                                aria-controls="nav-grid" aria-selected="true"><i
                                                    class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-list" type="button" role="tab"
                                                aria-controls="nav-list" aria-selected="false"><i
                                                    class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product" style="height: 552px">
                                            <div class="product-image">
                                                <img src="{{asset('assets/products/'.$product->image)}}" height="370px" alt="#" width="400px">
                                                
                             @if($product->discount!=null)
                             <span class="sale-tag">{{$product->discount->discount}}
                                 @if($product->discount->discound_type=='fixied')
                                 $
                             @else
                             %
                                                     @endif
                             </span>
                                                     @endif
                                                <div class="button">
                                                    <form method="post" action="{{route('front.card.add',$product->id)}}">
                                                        @csrf
                                                        <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                                    <button class="btn"><i
                                                            class="lni lni-cart"></i> اضافة للسلة</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category">{{ $product->category->name}}</span>
                                                <h4 class="title">
                                                    <a href="{{route('front.products.show',$product->slug)}}">{{$product->title}}</a>
                                                </h4>
                                                <ul class="review">
                                                    @if(!$product->rattings->isEmpty())
                                                    <x-ratting  :ratting="$product->product_ratting"/>
                                                        <li><span>{{$product->product_ratting}}تقييم</span></li>
                                                    @else
                                                    لا يوجد تقييم
                                                    @endif
                                                </ul>
                                                <div class="price">
                                                    @if($product->discount!=null)

                                                    <span>${{$product->discount_data}}</span>
                                                    <span class="discount-price">{{$product->price}}</span>
                                                    @else
                                                    <span>{{$product->price}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>
                                    @endforeach
                                   
                                </div>
                                {{$products->links('vendor.pagination.products')}}
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @foreach ($products as $product )
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product" style="height: 552px">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="product-image">
                                                        <img src="{{asset('assets/products/'.$product->image)}}" alt="#">
                                                        <div class="button">
                                                            <form method="post" action="{{route('front.card.add',$product->id)}}">
                                                                @csrf
                                                            <button class="btn"><i
                                                                    class="lni lni-cart"></i> اضافة الي سلة</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-12">
                                                    <div class="product-info">
                                                        <span class="category">{{ $product->category->name}}</span>
                                                        <h4 class="title">
                                                            <a href="{{route('front.products.show',$product->slug)}}">{{ $product->title }}</a>
                                                        </h4>
                                                        <ul class="review">
                                                            @if(!$product->rattings->isEmpty())
                                                            <x-ratting  :ratting="$product->product_ratting"/>
                                                            <li><span>{{$product->product_ratting}} تقييم</span></li>
                                                            @else
                                                            لا يوجد تقييم
                                                            @endif
                                                        </ul>
                                                        <div class="price">
                                                            <span>$199.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>
                                    @endforeach
                                </div>
                                {{$products->links('vendor.pagination.products')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>