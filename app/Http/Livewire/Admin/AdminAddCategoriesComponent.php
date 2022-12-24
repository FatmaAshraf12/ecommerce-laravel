<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use Livewire\Component;
use Str;
class AdminAddCategoriesComponent extends Component
{ 
    public $name;
    public $slug;

    public function render()
    {
        return view('livewire.admin.admin-add-categories-component');
    }

    public function generateSlug(){
        $this->slug= Str::slug($this->name);
    }

    /*
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required'
        ]);
    }
*/
    public function store(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message','category has been added');
    }
}
