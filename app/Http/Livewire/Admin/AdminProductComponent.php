<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductComponent extends Component
{
    public $name , $slug , $short_description , $description , $sku , $regular_price , $sale_price ,
    $stock_status , $featured , $quantity , $image , $images , $category_id;

    public $update_product = false;
    use WithPagination;
    public function render()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(5);
        return view('livewire.admin.admin-product-component',['products'=>$products]);
    }


    public function delete($id){
        $product = Product::find($id);
        unlink('assets/imgs/shop/'.$product->image.'-1.jpg');
        $product->delete();
        session()->flash('message','Product has been deleted');
    }
}
