<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;

use App\Models\Category;

class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'Default Sorting';
    public $min_value = 0;
    public $max_value = 1000;

    public function changePageSize($size){
        $this->pageSize = $size;
    }

    public function changeOrderBy($orderBy){
        $this->orderBy = $orderBy;
    }

    public function render()
    {
        if($this->orderBy == 'Price: Low to High')
        $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','ASC')->paginate($this->pageSize);

        else if($this->orderBy == 'Price: High to Low')
        $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','DESC')->paginate($this->pageSize);

        else if($this->orderBy == 'By newness')
        $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('created_at','DESC')->paginate($this->pageSize);

        else
        $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->paginate($this->pageSize);

        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.shop-component' , ['products'=>$products,'categories'=>$categories]);
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
