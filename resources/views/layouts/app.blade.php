<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="flex min-h-screen bg-gray-50 dark:bg-gray-950">
            <!-- Sidebar with Animation -->
            <div class="animate-slide-in sidebar-shadow">
                <livewire:layout.navigation />
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col  bg-white dark:bg-gray-900 dark:text-gray-100">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-10">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between">
                                <div class="animate-fade-in">
                                    {{ $header }}
                                </div>
                                
                                <!-- Quick Stats Badge -->
                                <div class="hidden md:flex items-center space-x-4">
                                    <div class="flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg shadow-lg hover-lift">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                        <span class="text-sm font-semibold">Live</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                @endif

                <!-- Page Content with Animation -->
                <main class="flex-1 p-6 animate-fade-in custom-scrollbar overflow-y-auto">
                    <div class="max-w-7xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>
                
                <!-- Footer -->
                <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 mt-auto">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400">
                            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                            <p>Made with <span class="text-red-500"></span> Laravel & Livewire</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Floating Action Button -->
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                class="fixed bottom-8 right-8 bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded-full shadow-2xl hover-lift hover:scale-110 focus:outline-none focus:ring-4 focus:ring-purple-300"
                aria-label="Scroll to top">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
            </svg>
        </button>
        


        
    </body>
</html>