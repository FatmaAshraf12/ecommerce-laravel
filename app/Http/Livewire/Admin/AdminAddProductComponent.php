<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;
use Carbon\Carbon;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name , $slug , $short_description , $description , $sku , $regular_price , $sale_price ,
    $stock_status ='instock' , $featured = 0 , $quantity , $image , $images , $category_id;

    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories]);
    }

    public function generateSlug()
    {
        $this->slug= Str::slug($this->name);
    }

    public function store()
    {
        $this->validate([
            'name'=>'required|unique:products',
            'slug'=>'required|unique:products',
            'regular_price'=>'required',
            'sku'=>'required',
            'featured'=>'required',
            'quantity'=>'required'
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->sku = $this->sku;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('shop',$imageName);
        $product->image = $imageName;
        $product->images = $this->images;
        $product->category_id = $this->category_id;

        $product->save();

        session()->flash('message','Product has been added');
    }
}
