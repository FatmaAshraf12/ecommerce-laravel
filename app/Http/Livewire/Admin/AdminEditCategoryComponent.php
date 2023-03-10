<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Livewire\Component;
use Str;

class AdminEditCategoryComponent extends Component
{

    public $category_id;
    public $name;
    public $slug;

    public function mount($category_id){
        $category = Category::find($category_id);
        $this->category_id = $category_id;
        $this->name = $category ->name;
        $this->slug = $category ->slug;
    }
    public function generateSlug(){
        $this->slug= Str::slug($this->name);
    }

    public function update($id){
        $this->validate([
            'name'=>'required|unique:products',
            'slug'=>'required|unique:products',
            'regular_price'=>'required',
            'sku'=>'required',
            'featured'=>'required',
            'quantity'=>'required'
        ]);

        $product = Product::find($id);
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



    public function render()
    {
        return view('livewire.admin.admin-edit-category-component');
    }
}
