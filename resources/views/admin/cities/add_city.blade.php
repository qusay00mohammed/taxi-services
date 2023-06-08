@extends('layouts.master_admin')

@section('title', 'add city')

@section('content')

<div class="container">
  <h1 class="text-center">Add City</h1>
  <form action="{{ route('cities.store') }}" method="POST" class="form-horizontal">
    @csrf
    <!-- Start name field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-3 control-label">City Name <span class="required">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="name" class="form-control" required placeholder="ENTER CITY NAME">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End name field -->

    <!-- Start price field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-3 control-label">Price <span class="required">*</span></label>
      <div class="col-sm-9">
        <input type="number" name="price" class="form-control" required placeholder="ENTER THE PRICE OF CITY" max="30000">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End price field -->

    <!-- Start submit field -->
    <div class="form-group form-group-lg">
      <div class="col-sm-offset-3 col-sm-10">
        <input type="submit" value="Add Taxi" class="btn btn-primary btn-lg">
      </div>
    </div>
    <!-- End submit field -->
  </form>
</div>

@endsection
