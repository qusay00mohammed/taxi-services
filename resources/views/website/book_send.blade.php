<ul>
  <li>Details Booking</a></li>
</ul>
<div>
  <div>
    <div>
      <li><span>Name</span> : {{ $mile->firstName }}
        {{ $mile->lastName }} </li>
    </div>
    <div>
    <li><span>Booking number</span> : {{ $mile->id }} </li>
  </div>
    <div>
      <li><span>Email</span> : {{ $mile->email }} </li>
    </div>
    <div>
      <li><span>Mobile Number</span> :
        {{ $mile->phone ?? ' No' }} </li>
    </div>
  </div>
  <div>
    <div>
      <li><span>Pickup Location</span> :
        {{ $mile->pickupLocation }} </li>
    </div>
    <div>
      @if ($mile->endLocation != null)
        <li><span>End Location</span> :
          {{ $mile->endLocation }} </li>
      @else
        <li><span>Pickup City</span> :
          {{ $mile->city->name }} </li>
      @endif
    </div>

    @if ($mile->end_city_id != null)
      <div>
        <li><span>End City</span> : {{ $mile->state->name }}
        </li>
      </div>
    @endif


    <div>
      <li><span>Selected Car</span> :
        {{ $mile->taxi->vehicleType ?? ' No' }} </li>
    </div>
  </div>
  <div>
    <div>
      <li><span>Pickup Date</span> :
        {{ $mile->pickupDate }} </li>
    </div>
    <div>
      <li><span>Pickup Time</span> :
        {{ $mile->pickupTime }} </li>
    </div>
    <div>
      <li><span>Reservation Type</span> : @if ($mile->way == 1)
          One Way Trip
        @elseif($mile->way == 2)
          Two Way Trip
        @endif
      </li>
    </div>
  </div>
  <div>
    <div>
      <li><span>Number Of People</span> :
        {{ $mile->numberOfPeople }} </li>
    </div>
    <div>
      <li><span>Paying off</span> : @if ($mile->paymentMethod == 2)
          Unpaid $({{ number_format($mile->price, 2) }})
        @elseif($mile->paymentMethod == 1)
          Paid
        @endif
      </li>
    </div>
    <div>
      <li><span>Flight Number</span> :
        {{ $mile->flight_number ?? ' No' }} </li>
    </div>
  </div>
  <div>

    <div>
      <li><span>Number Of Bag</span> : {{ $mile->bag }}
      </li>
    </div>

    <div>
      <li><span>Comment</span> :
        {{ $mile->comment ?? 'No' }} </li>
    </div>

  </div>
</div>
