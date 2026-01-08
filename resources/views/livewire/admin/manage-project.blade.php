<div class="p-6">

    <h2 class="text-xl font-bold mb-4">Manage All Projects</h2>

    {{-- Search + Filter Bar --}}
    <div class="flex items-center gap-3 mb-5">
        <input 
            type="text" 
            wire:model.live="search" 
            class="border px-3 py-2 rounded w-60"
            placeholder="Search project..."
        >

        <select wire:model.live="filterStatus" class="border px-3 py-2 rounded">
            <option value="">All Status</option>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    <a wire:navigate href="{{ route('create-projects') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Create New Project</a>

    </div>

    {{-- Table --}}
    <div class="bg-white shadow rounded overflow-hidden">
        <table class="min-w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Screenshot</th>
                    <th class="border p-2">Title</th>
                    <th class="border p-2">Client</th>
                    <th class="border p-2">Category</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td class="border p-2">{{ $project->id }}</td>

                        <td class="border p-2">
                            @if ($project->screenshot)
                                <img src="{{ asset('storage/' . $project->screenshot) }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400 text-sm">No Image</span>
                            @endif
                        </td>

                        <td class="border p-2">{{ $project->title }}</td>
                        <td class="border p-2">{{ $project->client_name }}</td>
                        <td class="border p-2">{{ $project->category->name }}</td>

                        <td class="border p-2">
                            <span class="px-2 py-1 rounded text-white text-sm
                                @if($project->status === 'Pending') bg-yellow-500
                                @elseif($project->status === 'In Progress') bg-blue-500
                                @else bg-green-600 @endif">
                                {{ $project->status }}
                            </span>
                        </td>

                        <td class="border p-2 flex gap-2">
                            <a href="#" class="px-3 py-1 bg-blue-600 text-white rounded text-sm">Edit</a>

                            <button 
                                wire:click="deleteProject({{ $project->id }})"
                                class="px-3 py-1 bg-red-600 text-white rounded text-sm"
                                onclick="return confirm('Delete this project?')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500">
                            No projects found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $projects->links() }}
    </div>

</div>
