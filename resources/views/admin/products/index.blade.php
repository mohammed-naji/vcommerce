@extends('admin.master')

@section('content')
    <h2>All Products ({{ $products->count() }})</h2>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif

    <table class="table table-bordered">
        <tr class="bg-dark text-white">
            <th>ID</th>
            <th>Name</th>
            <th>price</th>
            <th>image</th>
            <th>quantity</th>
            <th>serial_number</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        @forelse ($products as $product)
        <tr>
            {{-- <td>{{ $product->id }}</td> --}}
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->serial_number }}</td>
            <td>{{ $product->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('هل انت متاكد اخوي')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="4">No Data Found</td>
            </tr>
        @endforelse

    </table>
@stop
