<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'Default Sorting';

    public function changePageSize($size){
        $this->pageSize = $size;
    }

    public function changeOrderBy($orderBy){
        $this->orderBy = $orderBy;
    }

    public function render()
    {
        if($this->orderBy == 'Price: Low to High')
        $products = Product::orderBy('regular_price','ASC')->paginate($this->pageSize);

        else if($this->orderBy == 'Price: High to Low')
        $products = Product::orderBy('regular_price','DESC')->paginate($this->pageSize);

        else if($this->orderBy == 'By newness')
        $products = Product::orderBy('created_at','DESC')->paginate($this->pageSize);

        else
        $products = Product::paginate($this->pageSize);

        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.shop-component' , ['products'=>$products,'categories'=>$categories]);
    }
}
