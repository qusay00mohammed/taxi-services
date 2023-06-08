@extends('layouts.master_website')

@section('title', 'Booking Car')

@section('cssjs')

@endsection

@section('content')

  {{-- @if (Session::has('success'))
    <div class="col-12 alert alert-success justify-content-center d-flex">
      <p class="text-center">{{ Session::get('success') }}</p>
    </div>
  @endif --}}

  @if (Session::has('error'))
    <div class="col-12 alert alert-danger justify-content-center d-flex">
      <p class="text-center">{{ Session::get('error') }}</p>
    </div>
  @endif

  <!-- Start section Booking || Form -->
  <section class="tap-taxi-home mt-3">
    <!-- BEGIN Portlet PORTLET-->
    <div class="portlet light">
      <div class="portlet-body">
        <div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs mt-1  pb-3" role="tablist">
            <li role="presentation" class="li_tablist1"><a href="#cars-with-driver"
                class="taplist_li_a1 active title_form_scroll title_form" aria-controls="cars-with-driver" role="tab"
                data-toggle="tab" aria-expanded="true">Booking by mile</a></li>
            <li role="presentation" class="li_tablist2 title_form title_form_scroll"><a href="#cars-without-driver"
                class="taplist_li_a2" aria-controls="cars-without-driver" role="tab" data-toggle="tab"
                aria-expanded="false">Booking by city</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="cars-with-driver">
              <!-- Car Booking Start -->
              <div class="container-fluid mt-3  pb-3">
                <div class="container">
                  <form action="{{ route('mileStore') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-lg-8">

                        <h2 class="mb-2 title_form title_form_scroll">Personal Detail</h2>
                        <div class="mb-2">
                          <div class="row">
                            <div class="col-md-4 col-sm-6 form-group">
                              <input type="text" name="mile_firstname"
                                class="form-control p-4 title_form_input scrollreveal" placeholder="First Name"
                                required="required">
                              @error('mile_firstname')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                              <input type="text" name="mile_lastname"
                                class="form-control p-4 title_form_input scrollreveal" placeholder="Last Name"
                                required="required">
                              @error('mile_lastname')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                              
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                              <input type="email" name="mile_email"
                                class="form-control p-4 title_form_input scrollreveal" placeholder="Your Email"
                                required="required">
                              @error('mile_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-6 form-group input-group">
                              <div class="input-group-prepend ">
                                <label class="input-group-text  scrollreveal" for="flight_number">optional</label>
                              </div>
                              <input type="text" name="mile_flight_number"
                                class="form-control p-4 title_form_input scrollreveal" id="flight_number"
                                placeholder="Flight Number">
                            </div>
                            <div class="col-md-4 col-sm-6 form-group input-group">
                              <input type="tel" name="mile_phone"
                                class="form-control p-4 title_form_input scrollreveal" id="inputphone"
                                placeholder="Mobile Number" required>
                                <input type="hidden" name="mile_endPrice" required id="mile_endPrice">
                                @error('mile_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <h2 class="mb-3 title_form title_form_scroll">Booking Detail</h2>
                        {{-- <input type="search" class="form-control p-4 mb-2 title_form_input scrollreveal" placeholder="Search Location"> --}}
                        <div id="mile_map" style="width: 100%; height: 250px"></div>
                        <div class="mb-5">
                          <div class="row">
                            <div class="col-6 form-group">
                              <input type="text" name="mile_from" id="mile_from"
                                class="form-control p-4 title_form_input scrollreveal" placeholder="Pickup Location"
                                required>
                              @error('mile_from')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-6 form-group">
                              <input type="text" name="mile_to" id="mile_to"
                                class="form-control p-4 title_form_input scrollreveal" placeholder="End Location"
                                required>
                              @error('mile_to')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>

                            <div class="col-12 form-group input-group">
                              <div class="input-group-prepend">
                                <label class="input-group-text scrollreveal" for="inputGroupSelect01">optional</label>
                              </div>
                              <select name="mile_car"
                                class="custom-select px-4 select_car title_form_input scrollreveal"
                                id="inputGroupSelect01" style="height: 50px;">
                                <option selected disabled onchange="">Select Car </option>
                                @foreach ($taxis as $t)
                                  <option value="{{ $t->id }}">Car {{ $t->vehicleType }}</option>
                                @endforeach
                              </select>
                              @error('mile_car')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6 form-group">
                              <div class="date" id="date2" data-target-input="nearest">
                                <input type="text" name="mile_pickup_date"
                                  class="form-control p-4 datetimepicker-input title_form_input scrollreveal"
                                  placeholder="Pickup Date" data-target="#date2" data-toggle="datetimepicker"
                                  required />
                                @error('mile_pickup_date')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-6 form-group">
                              <div class="time" id="time2" data-target-input="nearest">
                                <input type="text" name="mile_pickup_time"
                                  class="form-control p-4 datetimepicker-input scrollreveal title_form_input"
                                  placeholder="Pickup Time" data-target="#time2" data-toggle="datetimepicker" />
                                @error('mile_pickup_time')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">

                            <div class="col-md-4 col-sm-6 form-group">
                              <select name="mile_people" class="custom-select px-4 title_form_input"
                                style="height: 50px;" required>
                                <option selected disabled>Select the number of people</option>
                                <option value="1">One person</option>
                                <option value="2">two persons</option>
                                <option value="3">three persons</option>
                                <option value="4">four people</option>
                                <option value="5">five people</option>
                                <option value="6">Six people</option>
                                <option value="7">seven people</option>
                              </select>
                              @error('mile_people')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                                <select name="mile_bag" class="custom-select px-4 title_form_input"
                                  style="height: 50px;" required>
                                  <option selected disabled>Select the number of bags</option>
                                  <option value="0">Zero</option>
                                  <option value="1">One bag</option>
                                  <option value="2">two bag</option>
                                  <option value="3">three bag</option>
                                  <option value="4">four bag</option>
                                  <option value="5">five bag</option>
                                  <option value="6">Six bag</option>
                                </select>
                                @error('mile_bag')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            <div class="col-md-4 col-sm-6 form-group">
                              <div class="custom-control custom-radio" style="display: inline-block">
                                <input type="radio" value="1" class="custom-control-input scrollreveal"
                                  name="mile_way" id="one_way" checked>
                                <label class="custom-control-label scrollreveal" for="one_way">One Way</label>
                              </div>
                              <div class="custom-control custom-radio" style="display: inline-block; margin-left: 15px">
                                <input type="radio" value="2" class="custom-control-input scrollreveal"
                                  name="mile_way" id="two_way">
                                <label class="custom-control-label scrollreveal" for="two_way">Two Way</label>
                              </div>
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-6 form-group">
                              <input type="text" name="mile_mile" id="mile_mile" readonly
                                class="form-control p-4 title_form_input scrollreveal" placeholder="Mile" required>
                              @error('mile_mile')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-6 form-group">
                              <input type="text" name="mile_price" id="mile_price" readonly
                                class="form-control p-4 title_form_input scrollreveal" placeholder="Amount" required>
                              @error('mile_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-12 form-group">
                              <div onclick="calcRoute();" class="btn btn-block btn-primary"
                                style="height: 50px; line-height: 1.5; font-size: 25px">Calc</div>
                            </div>
                            
                          </div>

                          <div class="row">
                            <div class="col-12 form-group">
                                <textarea placeholder="Write Your Comment" name="mile_comment" class="form-control p-4 title_form_input scrollreveal"></textarea>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="bg-secondary p-5 mb-5">
                          <h2 class="text-primary mb-4 scrollreveal">Payment</h2>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input type="radio" value="1" class="custom-control-input scrollreveal"
                                name="mile_payment" id="mile_credit" checked>
                              <label class="custom-control-label scrollreveal" for="mile_credit">Pay now</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input type="radio" value="2" class="custom-control-input scrollreveal"
                                name="mile_payment" id="mile_delivery">
                              <label class="custom-control-label scrollreveal" for="mile_delivery">Pay later</label>
                            </div>
                          </div>
                          <button type="submit"
                            class="btn btn-block btn-primary py-3 mt-5 scrollreveal">Submit</button>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
              <!-- Car Booking End -->
            </div>

            <div role="tabpanel" class="tab-pane" id="cars-without-driver">
              <!-- Car Booking Start -->
              <div class="container-fluid mt-3  pb-3">
                <div class="container">
                  <form action="{{ route('cityStore') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-lg-8">
                        <h2 class="mb-2 title_form">Personal Detail</h2>
                        <div class="mb-2">
                          <div class="row">
                            <div class="col-md-4 col-sm-6 form-group">
                              <input type="text" name="city_firstname" class="form-control p-4 title_form_input"
                                placeholder="First Name" required="required">
                              @error('city_firstname')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                              <input type="text" name="city_lastname" class="form-control p-4 title_form_input"
                                placeholder="Last Name" required="required">
                              @error('city_lastname')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                              <input type="email" name="city_email" class="form-control p-4 title_form_input"
                                placeholder="Your Email" required="required">
                              @error('city_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-6 form-group input-group">
                              <div class="input-group-prepend ">
                                <label class="input-group-text" for="flight_numbr">optional</label>
                              </div>
                              <input type="text" name="city_flight_number" class="form-control p-4 title_form_input"
                                id="flight_numbr" placeholder="Flight Number">
                            </div>
                            <div class="col-md-4 col-sm-6 form-group input-group">
                              <input type="tel" name="city_phone" class="form-control p-4 title_form_input"
                                id="inputphone" placeholder="Mobile Number" required>
                                @error('city_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <h2 class="mb-3 title_form">Booking Detail</h2>
                        {{-- <div id="city_map" style="width: 100%; height: 250px"></div> --}}
                        <div class="mb-5">
                          <div class="row">
                            <div class="col-md-4 col-sm-6 form-group">
                              <select name="city_pickup" class="custom-select px-4 select_car title_form_input"
                                id="inputGroupSelect02" style="height: 50px;" required>
                                <option selected disabled>Select Pickup City</option>
                                @foreach ($cities as $t)
                                  <option value="{{ $t->id }}">{{ $t->name }}  &nbsp; -
                                    &nbsp;<span>{{ $t->price }}$</span> </option>
                                @endforeach
                              </select>
                              @error('city_pickup')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                              <select name="city_end" class="custom-select px-4 select_car title_form_input"
                                id="inputGroupSelect01" style="height: 50px;" required>
                                <option selected disabled>Select End City</option>
                                @foreach ($cities as $t)
                                  <option value="{{ $t->id }}">{{ $t->name }} &nbsp; -
                                    &nbsp;<span>{{ $t->price }}$</span> </option>
                                @endforeach
                              </select>
                              @error('city_end')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 form-group input-group">
                                <div class="input-group-prepend ">
                                  <label class="input-group-text" for="flight_numbr">optional</label>
                                </div>
                                <input type="text" name="city_pickup_location" class="form-control p-4 title_form_input"
                                  id="city_pickup" placeholder="Puckup Location">
                              </div>
                          </div>


                          <div class="row">
                            <div class="col-12 form-group input-group">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03">optional</label>
                              </div>
                              <select name="city_car" class="custom-select px-4 select_car title_form_input"
                                id="inputGroupSelect03" style="height: 50px;">
                                <option selected disabled>Select Car </option>
                                @foreach ($taxis as $t)
                                  <option value="{{ $t->id }}">Car {{ $t->vehicleType }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-6 form-group">
                              <div class="date" id="date1" data-target-input="nearest">
                                <input type="text" name="city_pickup_date" required
                                  class="form-control p-4 datetimepicker-input title_form_input"
                                  placeholder="Pickup Date" data-target="#date1" data-toggle="datetimepicker" />
                                @error('city_pickup_date')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-6 form-group">
                              <div class="time" id="time1" data-target-input="nearest">
                                <input type="text" name="city_pickup_time" required
                                  class="form-control p-4 datetimepicker-input title_form_input"
                                  placeholder="Pickup Time" data-target="#time1" data-toggle="datetimepicker" />
                                @error('city_pickup_time')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-6 form-group">
                              <select name="city_people" class="custom-select px-4 title_form_input"
                                style="height: 50px;" required>
                                <option selected disabled>Select the number of people</option>
                                <option value="1">One person</option>
                                <option value="2">two persons</option>
                                <option value="3">three persons</option>
                                <option value="4">four people</option>
                                <option value="5">five people</option>
                                <option value="6">Six people</option>
                                <option value="7">seven people</option>
                              </select>
                              @error('city_people')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                                <select name="city_bag" class="custom-select px-4 title_form_input"
                                  style="height: 50px;" required>
                                  <option selected disabled>Select the number of bags</option>
                                  <option value="0">Zero</option>
                                  <option value="1">One bag</option>
                                  <option value="2">two bag</option>
                                  <option value="3">three bag</option>
                                  <option value="4">four bag</option>
                                  <option value="5">five bag</option>
                                  <option value="6">Six bag</option>
                                </select>
                                @error('city_bag')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2 col-sm-6 form-group">
                              <div class="form-group" style="display: inline-block">
                                <div class="custom-control custom-radio" style="display: inline-block">
                                  <input checked type="radio" value="1" class="custom-control-input"
                                    name="city_way" id="city_one_way">
                                  <label class="custom-control-label" for="city_one_way">One Way</label>
                                </div>
                                <div class="custom-control custom-radio" style="display: inline-block; margin-left: 15px">
                                    <input type="radio" value="2" class="custom-control-input" name="city_way"
                                      id="city_two_way">
                                    <label class="custom-control-label" for="city_two_way">Two Way</label>
                                  </div>
                              </div>

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 form-group custom-textarea">
                                <textarea placeholder="Write Your Comment" name="city_comment" class="form-control p-4 title_form_input"></textarea>
                            </div>
                          </div>


                        </div>
                      </div>
                      <div class="col-lg-4">

                        <div class="bg-secondary p-5 mb-5">
                            <h2 class="text-primary mb-4">Payment</h2>
                            <div class="form-group">
                              <div class="custom-control custom-radio">
                                <input
                                  type="radio"
                                  checked
                                  class="custom-control-input"
                                  name="city_payment"
                                  id="paypall"
                                  value="1"
                                />
                                <label class="custom-control-label" for="paypall"
                                  >Pay now</label
                                >
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="custom-control custom-radio">
                                <input
                                  type="radio"
                                  class="custom-control-input"
                                  name="city_payment"
                                  id="directcheckk"
                                  value="2"
                                />
                                <label
                                  class="custom-control-label"
                                  for="directcheckk"
                                  >Pay later</label
                                >
                              </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary py-3 mt-5" > Submit </button>
                          </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Car Booking End -->
            </div>
          </div>
        </div>
      </div>
      <!-- END Portlet PORTLET-->
    </div>
  </section>
  <!-- end section Booking  || Form-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6g9RLFI3-V7NH6UzH33zLRiSaw3a23WI&libraries=places">
  </script>


  @section('js')

  @endsection



  <script src="{{ asset('website/js/map.js') }}"></script>



@stop
