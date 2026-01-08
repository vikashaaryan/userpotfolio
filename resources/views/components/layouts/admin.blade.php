<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>{{ $title ?? 'Admin Panel' }}</title>
</head>

<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg border-r flex flex-col">

        <div class="p-5 border-b">
            <h2 class="text-xl font-bold">Admin Panel</h2>
        </div>

        <nav class="flex-1 p-4 space-y-2">

            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Dashboard</a>
            <a wire:navigate href="{{ route('category') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Categories</a>
            <a wire:navigate href="{{ route('manage-project') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Projects</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Users</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Settings</a>

        </nav>

        <div class="p-4 border-t">
            <button class="w-full px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                Logout
            </button>
        </div>

    </aside>

    <!-- Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        {{ $slot }}
    </main>

</div>

</body>
</html>
