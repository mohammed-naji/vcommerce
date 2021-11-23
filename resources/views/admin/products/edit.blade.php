@extends('admin.master')

@section('content')
    <h2>Update discount : <b class="text-warning">{{ $discount->name }}</b></h2>

    @include('admin.errors')

    <form action="{{ route('admin.discounts.update', $discount->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $discount->name) }}" />
        </div>

        <div class="mb-3">
            <input type="datetime-local" class="form-control" name="start_date" value="{{ old('start_date', date('Y-m-d\TH:i', strtotime($discount->start_date)) ) }}" placeholder="Start Date" />
        </div>

        <div class="mb-3">
            <input type="datetime-local" class="form-control" name="end_date" value="{{ old('end_date', date('Y-m-d\TH:i', strtotime($discount->end_date)) ) }}" placeholder="End Date" />
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="percentage" value="{{ old('name', $discount->percentage) }}" placeholder="Percentage" />
        </div>

        <div class="mb-3">
            <input type="number" class="form-control" name="customers" value="{{ old('name', $discount->customers) }}" placeholder="Customers" />
        </div>

        <button class="btn btn-info btn-lg">Update</button>

    </form>
@stop
