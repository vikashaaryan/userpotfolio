<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
#[Layout('components.layouts.admin')]

class ManageCategory extends Component
{

    
    use WithPagination;

    public $name;
    public $categoryId;
    public $search = '';
    public $editMode = false;

    protected $rules = [
        'name' => 'required|string|max:100',
    ];

    protected $paginationTheme = 'tailwind';

    // Reset form
    public function resetForm()
    {
        $this->name = '';
        $this->categoryId = null;
        $this->editMode = false;
    }

    // Save new category
    public function store()
    {
        $this->validate();
        Category::create(['name' => $this->name]);
        session()->flash('message', 'Category added successfully.');
        $this->resetForm();
    }

    // Edit category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->editMode = true;
    }

    // Update category
    public function update()
    {
        $this->validate();
        $category = Category::findOrFail($this->categoryId);
        $category->update(['name' => $this->name]);
        session()->flash('message', 'Category updated successfully.');
        $this->resetForm();
    }

    // Delete category
    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('message', 'Category deleted successfully.');
    }

  
    public function render()
    {
        
        $categories = Category::where('name','like','%'.$this->search.'%')
                        ->orderBy('id','desc')
                        ->paginate(5);
        return view('livewire.admin.manage-category', compact('categories'));
    }
}
