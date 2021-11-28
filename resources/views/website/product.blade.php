<div class="single-product">
    <div class="product-img">
        <a href="{{ route('website.product', $product->slug) }}">
            <img class="default-img" src="{{ asset('images/'.$product->image) }}" alt="#">
        </a>
        {{-- <div class="button-head">
            <div class="product-action">
                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
            </div>
            <div class="product-action-2">
                <a title="Add to cart" href="#">Add to cart</a>
            </div>
        </div> --}}
    </div>
    <div class="product-content">
        @php
            $title = 'name_en';
            if (app()->currentLocale() == 'ar') {
                $title = 'name_ar';
            }


        @endphp
        <h3><a href="{{ route('website.product', $product->slug) }}">{{ $product->$title }}</a></h3>
        <div class="product-price">
            <span>${{ $product->price }}</span>
        </div>
    </div>
</div>
