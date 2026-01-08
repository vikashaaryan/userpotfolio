<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class ManageProject extends Component
{
    use WithPagination;

    public $search = '';
    public $filterStatus = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterStatus' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);

        if ($project->screenshot && file_exists(public_path('storage/' . $project->screenshot))) {
            unlink(public_path('storage/' . $project->screenshot));
        }

        $project->delete();

        session()->flash('message', 'Project deleted successfully!');
    }

    public function render()
    {
        $projects = Project::with('category')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                      ->orWhere('client_name', 'like', "%{$this->search}%");
            })
            ->when($this->filterStatus, function ($query) {
                $query->where('status', $this->filterStatus);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.manage-project', compact('projects'));
    }
}
