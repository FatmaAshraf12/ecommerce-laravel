<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Cart;

class HomeComponent extends Component
{
    public function render()
    {
        $new = Product::orderBy('created_at','DESC')->get();
        $featured = Product::where('featured',1)->get();
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.home-component',['new'=>$new , 'categories'=>$categories , 'featured'=>$featured]);
    }


    public function add_to_cart($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item Added To Cart');
        return redirect()->route('cart');
    }

    public function add_to_wishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item Added To Wishlist');
        return redirect()->route('wishlist');
    }
}
