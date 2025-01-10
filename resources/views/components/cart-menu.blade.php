<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{ $items->count() }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ $items->count() }} Items</span>
            <a href="{{ route('front.card') }}">View Cart</a>
        </div>
        <ul class="shopping-list">
            @foreach($items as $item)
            <li>
                <a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
                <div class="cart-img-head">
                    <a class="cart-img" href="{{ route('front.products.show', $item->products->slug) }}">
                        <img src="{{ $item->products->image_url }}" alt="#"></a>
                </div>
                <div class="content">
                    <h4><a href="{{route('front.card')}}">{{ $item->products->title }}</a></h4>
                    <p class="quantity">{{ $item->qunatity }}x - <span class="amount">{{ $item->price }}</span></p>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">{{ $total}}</span>
            </div>
            <div class="button">
                <a href="{{-- route('checkout') --}}" class="btn animate">Checkout</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>