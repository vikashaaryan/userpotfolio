<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;

class Dashboard extends Component
{
    public $activeTab;
    public $categories = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->activeTab = $this->categories->first()->id ?? null;
    }

    public function setTab($categoryId)
    {
        $this->activeTab = $categoryId;
    }

    public function render()
    {
        $projects = Project::where('category_id', $this->activeTab)->get();

        return view('livewire.user.dashboard', compact('projects'));
    }
}
