<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class SearchComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'Default Sorting';
    public $q;
    public $search_term;

    public function mount(){
        $this->fill(request()->only('q'));
        $this->search_term = '%'.$this->q .'%';
    }

    public function changePageSize($size){
        $this->pageSize = $size;
    }

    public function changeOrderBy($orderBy){
        $this->orderBy = $orderBy;
    }

    public function render()
    {
        if($this->orderBy == 'Price: Low to High')
        $products = Product::where('name','like',$this->search_term)->orderBy('regular_price','ASC')->paginate($this->pageSize);

        else if($this->orderBy == 'Price: High to Low')
        $products = Product::where('name','like',$this->search_term)->orderBy('regular_price','DESC')->paginate($this->pageSize);

        else if($this->orderBy == 'By newness')
        $products = Product::where('name','like',$this->search_term)->orderBy('created_at','DESC')->paginate($this->pageSize);

        else
        $products = Product::where('name','like',$this->search_term)->paginate($this->pageSize);

        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.search-component' , ['products'=>$products,'categories'=>$categories]);
    }
}
