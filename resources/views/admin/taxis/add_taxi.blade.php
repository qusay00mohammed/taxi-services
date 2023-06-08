@extends('layouts.master_admin')

@section('title', 'add taxi')

@section('content')

<div class="container">
  <h1 class="text-center">Add Taxi</h1>
  <form action="{{ route('taxis.store') }}" method="POST" class="form-horizontal">
    @csrf
    <!-- Start vehicleType field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-3 control-label">Vehicle Type <span class="required">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="vehicleType" class="form-control" required placeholder="ENTER VEHICLE TYPE">
        @error('vehicleType')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End vehicleType field -->

    <!-- Start numOfPeople field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-3 control-label">The Number Of People <span class="required">*</span></label>
      <div class="col-sm-9">
        <input type="number" name="numOfPeople" class="form-control" required placeholder="ENTER THE NUMBER OF PEOPLE" max="99">
        @error('numOfPeople')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End numOfPeople field -->

    <!-- Start price field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-3 control-label">Price <span class="required">*</span></label>
      <div class="col-sm-9">
        <input type="number" name="price" class="form-control" required placeholder="ENTER THE PRICE OF MILE" max="999">
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
