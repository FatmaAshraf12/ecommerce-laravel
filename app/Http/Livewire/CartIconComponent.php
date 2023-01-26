<?php

namespace App\Http\Livewire;

use Livewire\Component;


class CartIconComponent extends Component
{
   // protected $listeners = ['refreshComponents'=>'$refresh'];
    public function render()
    {
        //print(Cart::count());
        return view('livewire.cart-icon-component');
    }
}
