<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Header - Centered -->
    <div class="mb-12 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">My Projects</h1>
        <p class="text-gray-600 text-lg max-w-3xl mx-auto">Showcasing my work across different categories and technologies</p>
    </div>

    <!-- Tabs - Centered -->
    <div class="mb-12">
        <div class="flex flex-wrap justify-center gap-3 mb-4">
            @foreach($categories as $cat)
                <button 
                    wire:click="setTab({{ $cat->id }})"
                    class="px-6 py-3 rounded-full text-sm font-medium transition-all duration-300 transform hover:scale-105
                    {{ $activeTab === $cat->id 
                        ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg' 
                        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    <span class="flex items-center gap-2">
                        {{ $cat->name }}
                        @if($cat->project_count ?? false)
                            <span class="px-2 py-0.5 text-xs rounded-full 
                                {{ $activeTab === $cat->id ? 'bg-white/20' : 'bg-gray-300' }}">
                                {{ $cat->project_count }}
                            </span>
                        @endif
                    </span>
                </button>
            @endforeach
        </div>
    </div>

    <!-- Project Grid - Centered -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">

        @forelse ($projects as $project)
            <!-- Project Card -->
            <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 
                        overflow-hidden border border-gray-100 hover:border-blue-100 transform hover:-translate-y-1">

                <!-- Image Container -->
                <div class="relative overflow-hidden h-56">
                    @if($project->screenshot)
                        <img 
                            src="{{ asset('storage/'.$project->screenshot) }}" 
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 
                                    group-hover:opacity-100 transition-opacity duration-300"></div>
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-gray-500 font-medium">Project Preview</span>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Status Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1.5 text-xs font-semibold rounded-full text-white shadow-md
                            @if($project->status === 'Pending') bg-gradient-to-r from-amber-500 to-orange-500
                            @elseif($project->status === 'In Progress') bg-gradient-to-r from-blue-500 to-cyan-500
                            @else bg-gradient-to-r from-emerald-500 to-green-500 @endif">
                            {{ $project->status }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Title & Client -->
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors text-center">
                            {{ $project->title }}
                        </h3>
                        <div class="flex items-center justify-center gap-2 text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-sm font-medium">{{ $project->client_name }}</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-5 line-clamp-2 text-center">
                        {{ $project->description ?? 'No description available.' }}
                    </p>

                    <!-- Tech Stack -->
                    @if($project->tech_stack)
                        <div class="mb-5">
                            <p class="text-xs font-semibold text-gray-500 uppercase mb-2 text-center">Tech Stack</p>
                            <div class="flex flex-wrap gap-2 justify-center">
                                @php
                                    $techs = explode(',', $project->tech_stack);
                                @endphp
                                @foreach(array_slice($techs, 0, 4) as $tech)
                                    <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded-full">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                                @if(count($techs) > 4)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">
                                        +{{ count($techs) - 4 }} more
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Action Button -->
                    <div class="pt-4 border-t border-gray-100">
                        <button class="w-full py-2.5 px-4 bg-gray-50 hover:bg-blue-50 text-blue-600 font-medium 
                                    rounded-lg transition-colors duration-300 flex items-center justify-center gap-2 
                                    group-hover:text-blue-700">
                            <span>View Details</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <!-- Empty State - Centered -->
            <div class="col-span-3 py-20 text-center">
                <div class="max-w-md mx-auto">
                    <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-700 mb-3">No Projects Found</h3>
                    <p class="text-gray-500 mb-6">There are no projects in this category yet.</p>
                    <button class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white 
                                font-medium rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Create New Project
                    </button>
                </div>
            </div>
        @endforelse

    </div>

  
</div>

