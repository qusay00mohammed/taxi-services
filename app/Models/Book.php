<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'pickupLocation',
        'endLocation',
        'mile',
        'price',
        'taxi_id',
        'pickupDate',
        'pickupTime',
        'numberOfPeople',
        'paymentMethod',
        'way',
        'flight_number',
        'pickup_city_id',
        'end_city_id',
        'comment',
        'bag',
    ];

    public function taxi()
    {
        return $this->belongsTo(Taxi::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'pickup_city_id');
    }

    public function state()
    {
        return $this->belongsTo(City::class, 'end_city_id');
    }
}
