@extends('website.master')

@section('content')

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="w-100" src="{{ asset('images/'.$product->image) }}" alt="">

                @php
                    $album = explode(',', $product->album);
                @endphp
                @foreach ($album as $a)
                <img class="w-25" src="{{ asset('images/'.$a) }}" alt="">
                @endforeach


            </div>

            <div class="col-md-6">

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <h1>{{ $product->name }}</h1>
                <h4 class="my-4">Price {{ $product->price }}$</h4>
                <p>{{ $product->description }}</p>

                <div class="mt-5">
                    <form class="d-inline" action="{{ route('website.buy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <input type="hidden" name="type" value="cart" />

                        <button class="btn btn-primary">Add To Cart</button>
                    </form>

                    <form class="d-inline" action="{{ route('website.buy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <input type="hidden" name="type" value="wishlist" />

                        <button style="background: #f00" class="btn btn-warning">Add To Wishlist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
