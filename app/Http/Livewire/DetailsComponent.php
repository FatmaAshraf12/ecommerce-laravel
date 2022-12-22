<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $relatedProducts =  Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        $newProducts =  Product::latest()->take(4)->get();

        return view('livewire.details-component' , ['product'=>$product , 'related'=>$relatedProducts , 'new'=>$newProducts]);
    }
    public function add_to_cart($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item Added To Cart');
        return redirect()->route('cart');
    }
}
