<div class="p-6 bg-gray-100 min-h-screen">

    <h1 class="text-2xl font-bold mb-4">Manage Categories</h1>

    {{-- Success message --}}
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Add/Edit Form --}}
    <div class="mb-6 bg-white p-4 rounded shadow">
        <input type="text" wire:model="name" placeholder="Category Name"
            class="border p-2 w-full rounded mb-2">

        @if($editMode)
            <button wire:click="update" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Category
            </button>
            <button wire:click="resetForm" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Cancel
            </button>
        @else
            <button wire:click="store" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Add Category
            </button>
        @endif
    </div>

    {{-- Search --}}
    <div class="mb-4">
        <input type="text" wire:model="search" placeholder="Search categories..."
            class="border p-2 w-full rounded">
    </div>

    {{-- Category Table --}}
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($categories as $category)
                    <tr>
                        <td class="px-4 py-2">{{ $category->id }}</td>
                        <td class="px-4 py-2">{{ $category->name }}</td>
                        <td class="px-4 py-2 space-x-2 text-center">
                            <button wire:click="edit({{ $category->id }})"
                                class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </button>
                            <button wire:click="delete({{ $category->id }})"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">
                            No categories found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="p-4">
            {{ $categories->links() }}
        </div>
    </div>

</div>
