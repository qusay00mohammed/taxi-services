@extends('layouts.master_website')

@section('title', 'Details Booking')


@section('content')



  {{-- @if (Session::has('success'))
    <div class="col-12 alert alert-success justify-content-center d-flex">
      <p class="text-center">{{ Session::get('success') }}</p>
    </div>
  @endif

  @if (Session::has('error'))
    <div class="col-12 alert alert-danger justify-content-center d-flex">
      <p class="text-center">{{ Session::get('error') }}</p>
    </div>
  @endif --}}



  <!-- Start section Booking || Form -->
  <section class="tap-taxi-home mt-4">
    <!-- BEGIN Portlet PORTLET-->
    <div class="portlet light">
      <div class="portlet-body mt-5">
        <div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs mt-1  pb-5" role="tablist">
            <li role="presentation" class="li_tablist1"><a href="#cars-with-driver"
                class="taplist_li_a1 active title_form detailes_book" aria-controls="cars-with-driver" role="tab"
                data-toggle="tab" aria-expanded="true">Details Booking</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content" id="print">
            <div role="tabpanel" class="tab-pane active" id="cars-with-driver">
              <!-- Car Booking Start -->
              <div class="container-fluid mt-3  pb-3">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="mb-6">
                          
                        <div class="row mt-5 mb-4">
                          <div class="col-4 px-1 mb-2 item_footer" >
                            <a><img style="height: 130px; width: 250px; margin-top: -30px;"  src="{{ asset('website/img/loglog.jpg') }}" alt="image cars"></a>
                          </div>
                          
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Name</span> : {{ $mile->firstName }}
                              {{ $mile->lastName }} </li>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Booking number</span> : {{ $mile->id }} </li>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <!--<li class="item_detailes_book scrollreveal"><span>Mobile Number</span> :-->
                            <!--  {{ $mile->phone ?? ' No' }} </li>-->
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Mobile Number</span> :
                              {{ $mile->phone ?? ' No' }} </li>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Flight Number</span> :
                              {{ $mile->flight_number ?? ' No' }} </li>
                          </div>
                        </div>
                        <div class="row mt-5 mb-4">
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Pickup Location</span> :
                              {{ $mile->pickupLocation }} </li>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            @if ($mile->endLocation != null)
                              <li class="item_detailes_book scrollreveal"><span>End Location</span> :
                                {{ $mile->endLocation }} </li>
                            @else
                              <li class="item_detailes_book scrollreveal"><span>Pickup City</span> :
                                {{ $mile->city->name }} </li>
                            @endif
                          </div>

                          @if ($mile->end_city_id != null)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                              <li class="item_detailes_book scrollreveal"><span>End City</span> : {{ $mile->state->name }}
                              </li>
                            </div>
                          @endif


                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Selected Car</span> :
                              {{ $mile->taxi->vehicleType ?? ' No' }} </li>
                          </div>
                        </div>
                        <div class="row mt-5 mb-4">
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Pickup Date</span> :
                              {{ $mile->pickupDate }} </li>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Pickup Time</span> :
                              {{ $mile->pickupTime }} </li>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Reservation Type</span> : @if ($mile->way == 1)
                                One Way Trip
                              @elseif($mile->way == 2)
                                Two Way Trip
                              @endif
                            </li>
                          </div>
                        </div>
                        <div class="row mt-5 mb-4">
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Number Of People</span> :
                              {{ $mile->numberOfPeople }} </li>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Paying off</span> : @if ($mile->paymentMethod == 2)
                                Unpaid $({{ number_format($mile->price, 2) }})
                              @elseif($mile->paymentMethod == 1)
                                Paid
                              @endif
                            </li>
                          </div>
                          
                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Number Of Bag</span> : {{ $mile->bag }} </li>
                          </div>
                        </div>
                        <div class="row mt-5 mb-4">

                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Comment</span> : {{ $mile->comment ?? 'No' }} </li>
                          </div>

                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <li class="item_detailes_book scrollreveal"><span>Email</span> : {{ $mile->email }} </li>
                          </div>

                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                            <a>
                              <button class="btn btn-block btn-primary ml-4 scrollreveal download_detailes"
                                id="print_button" onclick="print_invoice()">
                                download by pdf
                              </button>
                            </a>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
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


  <script type="text/javascript">
    function print_invoice() {
      var printContents = document.getElementById('print').innerHTML;
      var originalContent = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContent;
      location.reload();
    }
  </script>
@stop
