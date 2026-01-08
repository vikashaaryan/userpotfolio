<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Project;
use App\Models\Category;
use Livewire\WithFileUploads;

#[Layout('components.layouts.admin')]
class CreateProject extends Component
{
    use WithFileUploads;

    public $category_id;
    public $client_name;
    public $title;
    public $description;
    public $tech_stack;
    public $status = 'Pending';
    public $screenshot;

    protected $rules = [
        'category_id' => 'required|exists:categories,id',
        'client_name' => 'required|string|max:100',
        'title' => 'required|string|max:150',
        'description' => 'nullable|string',
        'tech_stack' => 'nullable|string|max:255',
        'status' => 'required|in:Pending,In Progress,Completed',
        'screenshot' => 'nullable|image|max:2048', // 2MB to be safe
    ];

    // Reset form
    public function resetForm()
    {
        $this->category_id = '';
        $this->client_name = '';
        $this->title = '';
        $this->description = '';
        $this->tech_stack = '';
        $this->status = 'Pending';
        $this->screenshot = null;
    }

    // Save project
    public function store()
    {
        $this->validate();

        $screenshotPath = null;

        if ($this->screenshot) {
            // Ensure public storage exists
            $screenshotPath = $this->screenshot->store('projects', 'public');
        }

        // Use create() with array keys matching DB columns
        Project::create([
            'category_id' => $this->category_id,
            'client_name' => $this->client_name,
            'title' => $this->title,
            'description' => $this->description,
            'tech_stack' => $this->tech_stack,
            'status' => $this->status,
            'screenshot' => $screenshotPath, // Save relative path in DB
        ]);

        session()->flash('message', 'Project added successfully!');
        $this->resetForm();
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.create-project', compact('categories'));
    }
}
