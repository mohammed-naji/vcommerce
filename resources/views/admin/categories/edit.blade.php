@extends('admin.master')

@section('content')
    <h2>Update Category : <b class="text-warning">{{ $category->name }}</b></h2>

    @include('admin.errors')

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $category->name) }}" />
        </div>

        <button class="btn btn-info btn-lg">Update</button>

    </form>
@stop
