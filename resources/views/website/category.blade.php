@extends('website.master')
@section('content')
<div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($category->products as $product)
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    @include('website.product')
                </div>
                @empty
                    <p>No Products Found</p>
                @endforelse

            </div>
        </div>
</div>
@stop
