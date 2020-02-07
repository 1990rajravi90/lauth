<?php

namespace App\Billing;
use Illuminate\Support\Str;
use App\Billing\PaymentGatewayContract;
class CreditCardPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;
    public function __construct($currency){
        $this->currency = $currency;
        $this->discount = 0;
    }
    public function setDiscount($amount){
        $this->discount = $amount;
    }
    public function charge($amount){
        $fees = $amount * 0.03;
        return [
            'amount' => $amount + $fees - $this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fees' => $fees,
        ];
    }
}