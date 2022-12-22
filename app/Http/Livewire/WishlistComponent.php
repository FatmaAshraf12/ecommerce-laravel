<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class WishlistComponent extends Component
{
    public function render()
    {
        return view('livewire.wishlist-component');
    }

    public function destroy($id){
        Cart::instance('wishlist')->remove($id);
        session()->flash('success_message','Item has been removed from wishlist');
        $this->emitTo('wishlist-icon-component','refreshComponents');

    }

    public function clearAll(){
        Cart::instance('wishlist')->destroy();
    }
}
