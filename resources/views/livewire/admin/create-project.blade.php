<div class="w-full bg-gray-100 min-h-screen">

    <h1 class="text-2xl font-bold mb-4">Create Project</h1>

    {{-- Flash message --}}
    @if(session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Project Form --}}
    <div class="bg-white p-4 rounded shadow max-w-5xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="font-semibold">Category</label>
                <select wire:model="category_id" class="border p-2 w-full rounded">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="font-semibold">Client Name</label>
                <input type="text" wire:model="client_name" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="font-semibold">Project Title</label>
                <input type="text" wire:model="title" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="font-semibold">Tech Stack</label>
                <input type="text" wire:model="tech_stack" class="border p-2 w-full rounded">
            </div>

            <div class="md:col-span-2">
                <label class="font-semibold">Description</label>
                <textarea wire:model="description" class="border p-2 w-full rounded"></textarea>
            </div>

            <div>
                <label class="font-semibold">Status</label>
                <select wire:model="status" class="border p-2 w-full rounded">
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div>
                <label class="font-semibold">Screenshot</label>
                <input type="file" wire:model="screenshot" class="border p-2 w-full rounded">

                @if($screenshot)
                    <img src="{{ $screenshot->temporaryUrl() }}" class="mt-2 w-32 h-20 object-cover rounded">
                @endif
            </div>

        </div>

        <div class="mt-4">
            <button wire:click="store" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Add Project
            </button>
        </div>
    </div>

</div>
