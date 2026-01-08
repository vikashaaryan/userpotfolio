<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalCategories' => Category::count(),
            'totalProjects' => Project::count(),
            'totalUsers' => User::count(),
            'recentProjects' => Project::with('category')->latest()->take(5)->get(),
        ]);
    }
}
