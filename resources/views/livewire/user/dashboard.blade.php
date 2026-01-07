<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">User Dashboard</h1>

    <!-- Tabs -->
    <div class="flex gap-4 border-b pb-2 mb-6">

        <button 
            wire:click="setTab('web')"
            class="px-4 py-2 rounded 
            {{ $activeTab === 'web' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
            Web Designing
        </button>

        <button 
            wire:click="setTab('app')"
            class="px-4 py-2 rounded 
            {{ $activeTab === 'app' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
            App Development
        </button>

        <button 
            wire:click="setTab('billing')"
            class="px-4 py-2 rounded 
            {{ $activeTab === 'billing' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
            Billing Software
        </button>

    </div>

    <!-- Task List -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @forelse ($tasks as $task)
            <div class="p-4 border rounded shadow bg-white">
                <h3 class="text-lg font-semibold">{{ $task['project'] }}</h3>
                <p class="text-gray-600 text-sm">Client: {{ $task['client'] }}</p>
                <p class="mt-2 text-gray-700">{{ $task['details'] }}</p>
            </div>
        @empty
            <p class="text-gray-600">No tasks found for this category.</p>
        @endforelse

    </div>

</div>
