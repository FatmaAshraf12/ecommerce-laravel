<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;
use Carbon\Carbon;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $product_id;
    public $name , $slug , $short_description , $description , $sku , $regular_price , $sale_price ,
    $stock_status ='instock' , $featured = 0 , $quantity , $image , $images , $category_id,
    $newImage;


    public function generateSlug()
    {
        $this->slug= Str::slug($this->name);
    }


    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->name = $product->name ;
        $this->slug = $product->slug ;
        $this->short_description= $product->short_description ;
        $this->description=  $product->description ;
        $this->sku = $product->sku ;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity ;
        $this->image = $product->image;
        $this->images = $product->images;
        $this->category_id = $product->category_id;

    }
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();

        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories]);
    }

    public function update(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'regular_price'=>'required',
        ]);

        $product = Product::find($this->product_id);
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
        //$product->image = $this->image;

        if($this->newImage){
            unlink('assets/imgs/shop/'.$product->image);
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('shop',$imageName);
            $product->image = $imageName;
        }

        $product->images = $this->images;
        $product->category_id = $this->category_id;

        $product->save();

        session()->flash('message','Product has been updated');
    }
}
