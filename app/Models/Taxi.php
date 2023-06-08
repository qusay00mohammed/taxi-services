<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    use HasFactory;
    protected $fillable = ['vehicleType', 'numOfPeople', 'price', 'regStatus'];


    public function book()
    {
        return $this->hasOne(Taxi::class);
    }
}
