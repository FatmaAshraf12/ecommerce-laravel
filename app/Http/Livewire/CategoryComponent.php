<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class CategoryComponent extends Component
{

    public $slug;
    public function mount($slug){
        $this->slug = $slug;
    }

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
        $category = Category::where('slug',$this->slug)->first();
        $category_id = $category->id ;
        $category_name = $category->name;

        if($this->orderBy == 'Price: Low to High')
        $products = Product::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pageSize);

        else if($this->orderBy == 'Price: High to Low')
        $products = Product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pageSize);

        else if($this->orderBy == 'By newness')
        $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pageSize);

        else
        $products = Product::where('category_id',$category_id)->paginate($this->pageSize);

        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.category-component' , ['products'=>$products,'categories'=>$categories,'category_name'=>$category_name ,'category_slug'=>$this->slug]);
    }
}
