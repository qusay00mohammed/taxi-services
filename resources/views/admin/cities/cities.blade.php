@extends('layouts.master_admin')

@section('title', 'city')

@section('content')

  @if (Session::has('success'))
    <div class="col-12 alert alert-success justify-content-center d-flex">
      <p class="text-center">{{ Session::get('success') }}</p>
    </div>
  @endif

  @if (Session::has('error'))
    <div class="col-12 alert alert-danger justify-content-center d-flex">
      <p class="text-center">{{ Session::get('error') }}</p>
    </div>
  @endif

  <div class="container">

    <h1 class="text-center">Manage Cities</h1>
    <a style="margin-bottom: 10px" href="{{ route('cities.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add
      New City</a>
    <div class="table-responsive">
      <table class="table table-bordered text-center main-table">
        <tr>
          <td>#ID</td>
          <td>City Name</td>
          {{-- <td>The Number Of People</td> --}}
          <td>Price</td>
          <td>Registerd Date</td>
          <td>Control</td>
        </tr>

        @foreach ($cities as $key => $city)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $city->name }}</td>
            {{-- <td>{{ $city->numOfPeople }}</td> --}}
            <td>{{ $city->price }}</td>
            <td>{{ $city->created_at->toDateString() }}</td>
            <td>
              <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success"><i class="fa fa-edit"></i>
                Edit
              </a>
              <a href="{{ route('cities.destroy', $city->id) }}" class="btn btn-danger confirm"><i
                  class="fa fa-close"></i> Delete </a>

              @if ($city->regStatus == 0)
                <a href="{{ route('cities.show', $city->id) }}" class="btn btn-info activate"><i
                    class="fa fa-check"></i>
                  activate </a>
              @endif
            </td>
          </tr>
        @endforeach

      </table>
      {{ $cities->links() }}
    </div>
  </div>

@endsection
