<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminCategoriesComponent extends Component
{use WithPagination;



    public function render()
    {
        $categories = Category::orderBy('name','ASC')->paginate(5);
        return view('livewire.admin.admin-categories-component',['categories'=>$categories]);
    }


    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','category has been deleted');

    }
}
