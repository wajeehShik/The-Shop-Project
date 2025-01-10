<div class="col-lg-3 col-12 direction_rtl">
    <!-- Start Product Sidebar -->
    <div class="product-sidebar">
        <!-- Start Single Widget -->
        <div class="single-widget search">
            <h3>Search Product</h3>
            <form action="#">
                <input type="text" placeholder="Search Here...">
                <button type="submit"><i class="lni lni-search-alt"></i></button>
            </form>
        </div>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <div class="single-widget">
            <h3>All Categories</h3>
            <ul class="list">
              @foreach ($cats as $cat)
                <li>
                    <a href="{{route('front.products.category',$cat->id)}}">{{$cat->name}}</a><span>({{$cat->products_count}})</span>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <div class="single-widget range">
            <h3>Price Range</h3>
            <input type="range" class="form-range" name="range" step="1" min="100" max="10000"
                value="10" onchange="rangePrimary.value=value">
            <div class="range-inner">
                <label>$</label>
                <input type="text" id="rangePrimary" placeholder="100" />
            </div>
        </div>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <div class="single-widget condition">
            <h3>Filter by Price</h3>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                <label class="form-check-label" for="flexCheckDefault1">
                    $50 - $100L (208)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                <label class="form-check-label" for="flexCheckDefault2">
                    $100L - $500 (311)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                <label class="form-check-label" for="flexCheckDefault3">
                    $500 - $1,000 (485)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                <label class="form-check-label" for="flexCheckDefault4">
                    $1,000 - $5,000 (213)
                </label>
            </div>
        </div>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <div class="single-widget condition">
            <h3>Filter by Brand</h3>
            @foreach ($brands as $brand)
                
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                <label class="form-check-label" for="flexCheckDefault11">
                  {{$brand->name}} ({{$brand->products_count}})
                </label>
            </div>
            @endforeach
        </div>
        <!-- End Single Widget -->
    </div>
    <!-- End Product Sidebar -->
</div>