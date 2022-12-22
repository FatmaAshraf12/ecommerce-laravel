<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.cart-component');
    }


    public function increseQty($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty +1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponents');
    }
    public function decreseQty($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty -1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponents');

    }

    public function destroy($id){
        Cart::remove($id);
        session()->flash('success_message','Item has been deleted');
    }

    public function clearAll(){
        Cart::destroy();
    }
}
