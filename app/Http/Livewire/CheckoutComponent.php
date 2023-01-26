<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Livewire\Component;


class CheckoutComponent extends Component
{
    public $firstname, $mobile, $email, $line1, $subtotal, $discount, $tax, $total, $payment_type;

    public function render()
    {
        return view('livewire.checkout-component');
    }


    public function placeOrder()
    {
        $order = new Order();
        $order->user_id = 1;
        $order->firstname = $this->firstname;
        $order->mobile =  $this->mobile;
        $order->email =  $this->email;
        $order->line1 = $this->line1;
        $order->subtotal = Cart::subtotal();
        $order->total = Cart::total();
        $order->payment_type = $this->payment_type;
        $order->save();

        if ($this->payment_type == 'fatora')
            return redirect()->route('payForOrder', [$this->firstname, $this->email, $order->id, $order->total]);

        else
            return redirect('/');
    }
}
