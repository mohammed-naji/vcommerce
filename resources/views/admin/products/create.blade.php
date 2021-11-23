@extends('admin.master')

@section('content')
    <h2>Add New Product</h2>

    @include('admin.errors')


    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name" />
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="price" placeholder="price" />
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" class="form-control" name="image"/>
        </div>

        <div class="mb-3">
            <label>Album</label>
            <input type="file" class="form-control" multiple name="album[]"/>
        </div>

        <div class="mb-3">
            <input type="number" class="form-control" name="quantity" placeholder="quantity" />
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="serial_number" placeholder="serial number" />
        </div>

        <div class="mb-3">
            <textarea rows="5" class="form-control" name="description" placeholder="description"></textarea>
        </div>

        <div class="mb-3">
            <select class="form-control" name="category_id">
                <option value="" selected disabled>Select Category</option>

                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <select class="form-control" name="discount_id">
                <option value="" selected disabled>Select Discount</option>

                @foreach ($discounts as $dis)
                    <option value="{{ $dis->id }}">{{ $dis->name }}</option>
                @endforeach

            </select>
        </div>


        <button class="btn btn-dark btn-lg">Save</button>

    </form>
@stop
