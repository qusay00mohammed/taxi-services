<?php

namespace App\Http\Controllers;

use App\Mail\BookMail;
use App\Models\Book;
use App\Models\City;
use App\Models\Taxi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    
    public $emailAdmin = "qmkahlout@gmail.com";

    public function index()
    {
        return view('website.index');
    }

    public function booking()
    {
        $cities = City::where('regStatus', 1)->get();
        $taxis = Taxi::where('regStatus', 1)->get();
        return view('website.booking', compact('cities', 'taxis'));
    }

    public function pay_online()
    {
        return view('website.pay_online');
    }

    public function detail_booking(Request $request, $id, $email)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');
        
        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }
            $mile = Book::where('id', $id)->where('email', $email)->where('session_id', $sessionId)->first();
            if (!$mile) {
                throw new NotFoundHttpException();
            }
            $mile->paymentMethod = 1;
            $mile->save();
            // foreach ([$mile->email, $this->emailAdmin] as $recipient) {
            //     Mail::to($recipient)->send(new BookMail($mile));
            // }
           return redirect()->route('details_booking', ['id' => $mile->id, 'email' => $mile->email]);
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
        
        return redirect()->route('details_booking', ['id' => $mile->id, 'email' => $mile->email]);
    }

    public function detail_book($id, $email)
    {
        $mile = Book::where('id', $id)->where('email', $email)->first();
        // Mail::to($mile->email)->send(new BookMail($mile)); // Send email to customer
        // Mail::to($this->emailAdmin)->send(new BookMail($mile)); // Send email to admin
        
        // foreach ([$mile->email, $this->emailAdmin] as $recipient) {
        //     Mail::to($recipient)->send(new BookMail($mile));
        // }

        return redirect()->route('details_booking', ['id' => $mile->id, 'email' => $mile->email]);
    }


    public function details_booking($id, $email)
    {
        $mile = Book::where('id', $id)->where('email', $email)->first();
        return view('website.details_booking', compact('mile'));
    }








    public function checkout()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' =>  [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => "T-shirt",
                    ],
                    'unit_amount' => 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success', [], true). "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('cancel', [], true),
        ]);
        //
        return redirect($session->url);
    }


    public function success()
    {
        return view('vvv');
    }

    public function cancel($id, $email)
    {
        $mile = Book::where('id', $id)->where('email', $email)->first()->delete();
        return redirect()->route('index');
    }

































}
