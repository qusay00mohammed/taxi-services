<?php

namespace App\Http\Controllers;

use App\Mail\BookMail;
use App\Models\Book;
use App\Models\City;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    // public $emailAdmin = "Osaamabnkar@gmail.com";
    
    public function mileStore(Request $request)
    {
        
        try {
        $request->validate([
            'mile_payment' => 'required',
            'mile_way' => 'required',
            'mile_endPrice' => 'required',
        ]);
        
        $amount = $request->mile_endPrice * 3.5 + 5.3;
        if($request->mile_way == 2) {
            $amount = $amount * 2;
        }

        if ($request->mile_payment == 1) {
            $request->validate([
                'mile_firstname' => 'required',
                'mile_lastname' => 'required',
                'mile_email' => 'required',
                'mile_from' => 'required',
                'mile_to' => 'required',
                'mile_mile' => 'required',
                'mile_price' => 'required',
                'mile_phone' => 'required',
                'mile_pickup_date' => 'required',
                'mile_pickup_time' => 'required',
                'mile_people' => 'required',
                'mile_bag' => 'required',
            ]);

            $store = Book::create([
                'firstName' => $request->mile_firstname,
                'lastName' => $request->mile_lastname,
                'email' => $request->mile_email,

                'phone' => $request->mile_phone,
                'flight_number' => $request->mile_flight_number,
                'taxi_id' => $request->mile_car,

                'pickupLocation' => $request->mile_from,
                'endLocation' => $request->mile_to,
                'mile' => $request->mile_mile,
                'price' => $amount,
                'pickupDate' => $request->mile_pickup_date,
                'pickupTime' => $request->mile_pickup_time,
                'numberOfPeople' => $request->mile_people,
                'paymentMethod' => 2,
                'way' => $request->mile_way,
                'bag' => $request->mile_bag,
                'comment' => $request->mile_comment,
            ]);
            if ($store) {
                $mile = Book::findOrFail($store->id);

                $numberamount = intval($amount);
                //  Start Stripe
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
                $session = \Stripe\Checkout\Session::create([
                    'line_items' =>  [[
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => "Name: " . $mile->firstName . ' ' . $mile->lastName,
                            ],
                            'unit_amount' => $numberamount * 100,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => route('detail_booking', ['id' => $mile->id, 'email' => $mile->email], true) . "?session_id={CHECKOUT_SESSION_ID}",
                    'cancel_url' => route('cancel', ['id' => $mile->id, 'email' => $mile->email], true),
                ]);
                
                $book = Book::findOrFail($mile->id);
                $book->session_id = $session->id;
                $book->save();
                
                
                return redirect($session->url);
                // return redirect()->route('detail_booking', ['id' => $mile->id, 'email' => $mile->email])->withSuccess('created successfully');
            } else {
                return redirect()->back()->withError('not created successfully');
            }
        } else if ($request->mile_payment == 2) {
            $request->validate([
                'mile_firstname' => 'required',
                'mile_lastname' => 'required',
                'mile_email' => 'required',
                'mile_from' => 'required',
                'mile_to' => 'required',
                'mile_mile' => 'required',
                'mile_price' => 'required',
                'mile_pickup_date' => 'required',
                'mile_pickup_time' => 'required',
                'mile_people' => 'required',
                'mile_phone' => 'required',
                'mile_bag' => 'required',
            ]);


            //  تحقق من الدفع

            $store = Book::create([
                'firstName' => $request->mile_firstname,
                'lastName' => $request->mile_lastname,
                'email' => $request->mile_email,

                'phone' => $request->mile_phone,
                'flight_number' => $request->mile_flight_number,
                'taxi_id' => $request->mile_car,

                'pickupLocation' => $request->mile_from,
                'endLocation' => $request->mile_to,
                'mile' => $request->mile_mile,
                'price' => $amount,
                'pickupDate' => $request->mile_pickup_date,
                'pickupTime' => $request->mile_pickup_time,
                'numberOfPeople' => $request->mile_people,
                'paymentMethod' => $request->mile_payment,
                'way' => $request->mile_way,
                'bag' => $request->mile_bag,
                'comment' => $request->mile_comment,
            ]);

            if ($store) {
                $mile = Book::findOrFail($store->id);

                return redirect()->route('detail_book', ['id' => $mile->id, 'email' => $mile->email])->withSuccess('created successfully');
            } else {
                return redirect()->back()->withError('not created successfully');
            }
        }
        }catch(Exception $e){
            return redirect()->back()->withError('not created successfully');
        }
    }



    public function cityStore(Request $request)
    {
        try{
            $request->validate([
                'city_payment' => 'required',
            ]);

            if ($request->city_payment == 1) {
                $request->validate([
                    'city_firstname'   => 'required',
                    'city_lastname'    => 'required',
                    'city_email'       => 'required',
                    'city_pickup'      => 'required',
                    'city_end'         => 'required',
                    'city_pickup_date' => 'required',
                    'city_pickup_time' => 'required',
                    'city_people'      => 'required',
                    'city_way'         => 'required',
                    'city_payment'     => 'required',
                    'city_bag'         => 'required',
                    'city_phone'       => 'required',
                ]);
                $price = City::findOrFail($request->city_end);

                if($price->name == "Buffalo niagara international airport")
                {
                    $price = City::findOrFail($request->city_pickup);
                    $amountPrice = $price->price;
                }
                else
                {
                    $amountPrice = $price->price;
                }

                if ($request->city_way == 2) {
                    $amountPrice = $amountPrice * 2;
                }

                $store = Book::create([
                    'price' => $amountPrice,

                    'firstName' => $request->city_firstname,
                    'lastName' => $request->city_lastname,
                    'email' => $request->city_email,

                    'phone' => $request->city_phone,
                    'flight_number' => $request->city_flight_number,
                    'taxi_id' => $request->city_car,

                    'pickupLocation' => $request->city_pickup_location,
                    'pickupDate' => $request->city_pickup_date,
                    'pickupTime' => $request->city_pickup_time,
                    'numberOfPeople' => $request->city_people,
                    'paymentMethod' => 2,
                    'way' => $request->city_way,
                    'pickup_city_id' => $request->city_pickup,
                    'end_city_id' => $request->city_end,
                    'bag' => $request->city_bag,
                    'comment' => $request->city_comment,

                ]);
                if ($store) {

                    $mile = Book::findOrFail($store->id);


                    //  Start Stripe
                    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

                    $session = \Stripe\Checkout\Session::create([
                        'line_items' =>  [[
                            'price_data' => [
                                'currency' => 'usd',
                                'product_data' => [
                                    'name' => "Name: " . $mile->firstName . ' ' . $mile->lastName,
                                ],
                                'unit_amount' => $amountPrice * 100,
                            ],
                            'quantity' => 1,
                        ]],
                        'mode' => 'payment',
                        'success_url' => route('detail_booking', ['id' => $mile->id, 'email' => $mile->email], true) . "?session_id={CHECKOUT_SESSION_ID}",
                        'cancel_url' => route('cancel', ['id' => $mile->id, 'email' => $mile->email], true),
                    ]);
                    
                    $book = Book::findOrFail($mile->id);
                    $book->session_id = $session->id;
                    $book->save();

                    return redirect($session->url);

                    // return redirect()->route('detail_booking', ['id' => $mile->id, 'email' => $mile->email])->withSuccess('created successfully');
                } else {
                    return redirect()->back()->withError('not created successfully');
                }
            } else if ($request->city_payment == 2) {
                $request->validate([
                    'city_firstname'   => 'required',
                    'city_lastname'    => 'required',
                    'city_email'       => 'required',
                    'city_pickup'      => 'required',
                    'city_end'         => 'required',
                    'city_pickup_date' => 'required',
                    'city_pickup_time' => 'required',
                    'city_people'      => 'required',
                    'city_way'         => 'required',
                    'city_payment'     => 'required',
                    'city_bag'         => 'required',
                    'city_phone'       => 'required',
                ]);

                $price = City::findOrFail($request->city_end);

                if($price->name == "Buffalo niagara international airport")
                {
                    $price = City::findOrFail($request->city_pickup);
                    $amountPrice = $price->price;
                }
                else
                {
                    $amountPrice = $price->price;
                }

                if ($request->city_way == 2) {
                    $amountPrice = $amountPrice * 2;
                }

                //  تحقق من الدفع

                $store = Book::create([
                    'price' => $amountPrice,

                    'firstName' => $request->city_firstname,
                    'lastName' => $request->city_lastname,
                    'email' => $request->city_email,

                    'phone' => $request->city_phone,
                    'flight_number' => $request->city_flight_number,
                    'taxi_id' => $request->city_car,

                    'pickupLocation' => $request->city_pickup_location,
                    'pickupDate' => $request->city_pickup_date,
                    'pickupTime' => $request->city_pickup_time,
                    'numberOfPeople' => $request->city_people,
                    'paymentMethod' => $request->city_payment,
                    'way' => $request->city_way,
                    'pickup_city_id' => $request->city_pickup,
                    'end_city_id' => $request->city_end,
                    'bag' => $request->city_bag,
                    'comment' => $request->city_comment,
                ]);

                if ($store) {

                    $mile = Book::findOrFail($store->id);


                    return redirect()->route('detail_book', ['id' => $mile->id, 'email' => $mile->email])->withSuccess('created successfully');
                } else {
                    return redirect()->back()->withError('not created successfully');
                }
            }
        }catch(Exception $e){
            return redirect()->back()->withError('not created successfully');
        }
    }
    
    
    
    public function webhook()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = '';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $mile = Book::where('session_id', $session->id)->first();
                if ($mile && $mile->paymentMethod == 2) {
                    $mile->paymentMethod = 1;
                    $mile->save();
                    // Send email to customer
                    
                    // foreach ([$mile->email, $this->emailAdmin] as $recipient) {
                    //     Mail::to($recipient)->send(new BookMail($mile));
                    // }
                }

            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }
    
    
    
    
    
    
}
