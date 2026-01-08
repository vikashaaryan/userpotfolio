<div>

    <h1 class="text-2xl font-bold mb-4">Welcome Admin</h1>

    {{-- Top Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="p-4 bg-white shadow rounded">
            <h3 class="font-semibold text-lg">Total Categories</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalCategories }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded">
            <h3 class="font-semibold text-lg">Total Projects</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalProjects }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded">
            <h3 class="font-semibold text-lg">Users</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
        </div>

    </div>

    {{-- Recent Projects --}}
    <div class="mt-8 p-6 bg-white shadow rounded">

        <h2 class="text-xl font-semibold mb-3">Recent Projects</h2>

        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Project</th>
                    <th class="p-2 border">Client</th>
                    <th class="p-2 border">Category</th>
                    <th class="p-2 border">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($recentProjects as $project)
                    <tr>
                        <td class="p-2 border">{{ $project->title }}</td>
                        <td class="p-2 border">{{ $project->client_name }}</td>
                        <td class="p-2 border">{{ $project->category->name ?? 'N/A' }}</td>

                        <td class="p-2 border">
                            <span class="px-2 py-1 rounded text-white text-sm
                                @if($project->status === 'Pending') bg-yellow-500
                                @elseif($project->status === 'In Progress') bg-blue-500
                                @else bg-green-600 @endif">
                                {{ $project->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center text-gray-500">
                            No recent projects found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>
