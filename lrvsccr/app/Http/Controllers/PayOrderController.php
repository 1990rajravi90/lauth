<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Billing\PaymentGateway;

class PayOrderController extends Controller
{
    public function store(PaymentGateway $paymentGatway)
    //public function store()
    {
        //$paymentGatway = new PaymentGateway('USD');
        dd($paymentGatway->charge(2500));
    }
}
