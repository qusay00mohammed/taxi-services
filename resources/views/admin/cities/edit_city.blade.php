@extends('layouts.master_admin')

@section('title', 'edit city')

@section('content')

<div class="container">
  <h1 class="text-center">Edit City</h1>
  <form action="{{ route('cities.update', $city->id) }}" method="POST" class="form-horizontal">
    @csrf
    <!-- Start name field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-3 control-label">City Name <span class="required">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="name" class="form-control" required value="{{ $city->name }}">
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
        <input type="number" name="price" class="form-control" required value="{{ $city->price }}" max="30000">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End price field -->

    <!-- Start visibility field -->
    <div class="form-group form-group-lg">
        <label for="" class="col-sm-3 control-label">Status</label>
        <div class="col-sm-9">
            <input type="radio" id="active" name="groupId" {{ $city->regStatus == 1 ? 'checked' : '' }} value="1">
            <label for="active">Active</label>
            <br>
            <input type="radio" id="inactive" name="groupId" {{ $city->regStatus == 0 ? 'checked' : '' }}  value="0">
            <label for="inactive">Inactive</label>
        </div>
    </div>
    <!-- End visibility field -->

    <!-- Start submit field -->
    <div class="form-group form-group-lg">
      <div class="col-sm-offset-3 col-sm-10">
        <input type="submit" value="Edit Taxi" class="btn btn-primary btn-lg">
      </div>
    </div>
    <!-- End submit field -->
  </form>
</div>

@endsection
