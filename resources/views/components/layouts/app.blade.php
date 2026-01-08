<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>{{ $title ?? 'Portfolio | Creative Professional' }}</title>
       
    </head>
    <body class="bg-gray-50 text-gray-800">
        <!-- Header/Navigation -->
        <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md shadow-sm border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16 md:h-20">
                    
                    <!-- Logo/Brand -->
                    <div class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-md">
                            <span class="text-white font-bold text-xl">P</span>
                        </div>
                        <div>
                            <a href="/" class="text-2xl font-bold bg-blue-600 bg-clip-text text-transparent">
                                Portfolio
                            </a>
                            <p class="text-xs text-gray-500 -mt-1 hidden sm:block">Creative Developer</p>
                        </div>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex items-center space-x-8">
                        <a href="/" class="nav-link font-medium text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-home mr-2"></i>Home
                        </a>
                        <a href="/projects" class="nav-link font-medium text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-briefcase mr-2"></i>Projects
                        </a>
                        <a href="/about" class="nav-link font-medium text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-user mr-2"></i>About
                        </a>
                        <a href="/skills" class="nav-link font-medium text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-code mr-2"></i>Skills
                        </a>
                        <a href="/contact" class="nav-link font-medium text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-envelope mr-2"></i>Contact
                        </a>
                    
                        
                        <!-- CTA Button -->
                        <a href="/contact" class="px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                            Hire Me
                        </a>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuButton" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <i class="fas fa-bars text-xl text-gray-700"></i>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobileMenu" class="mobile-menu hidden md:hidden py-4 border-t border-gray-100">
                    <div class="flex flex-col space-y-4">
                        <a href="/" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-home mr-3 w-5 text-center"></i>Home
                        </a>
                        <a href="/projects" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-briefcase mr-3 w-5 text-center"></i>Projects
                        </a>
                        <a href="/about" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-user mr-3 w-5 text-center"></i>About
                        </a>
                        <a href="/skills" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-code mr-3 w-5 text-center"></i>Skills
                        </a>
                        <a href="/contact" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-envelope mr-3 w-5 text-center"></i>Contact
                        </a>
                        <div class="pt-4 border-t border-gray-200">
                            <a href="/contact" class="block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium rounded-lg hover:shadow-md transition-all">
                                Hire Me
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

       

        <!-- Main Content -->
        <main class="min-h-screen ">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-8 md:mb-0">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-xl">P</span>
                            </div>
                            <span class="text-2xl font-bold">Portfolio</span>
                        </div>
                        <p class="text-gray-400 max-w-md">
                            Creating beautiful, functional digital experiences with modern technologies.
                        </p>
                    </div>
                    
                    <div class="flex space-x-6">
                        <a href="https://github.com" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-gray-700 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-blue-700 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-blue-500 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="mailto:hello@example.com" class="w-10 h-10 bg-gray-800 hover:bg-red-600 rounded-full flex items-center justify-center transition-colors">
                            <i class="fas fa-envelope text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                    <p>&copy; {{ date('Y') }} Portfolio. All rights reserved.</p>
                    <p class="mt-2">Built with Laravel & Tailwind CSS</p>
                </div>
            </div>
        </footer>

     
    </body>
</html>