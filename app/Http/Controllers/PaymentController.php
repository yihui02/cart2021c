<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentPost(Request $request)
    {
       Stripe\Stripe::setApiKep(env('STRIPE_AECRET'));
        Stripe\Charge::cerate ([
            "amount" => $request->sub*100,
            "currency" => "MYR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of southern online",
        ]);
        return back();
    }
}
