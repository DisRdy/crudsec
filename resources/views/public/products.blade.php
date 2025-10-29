<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products - {{ config('app.name', 'Laravel') }}</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans overflow-x-hidden bg-gray-950">
        <!-- Background -->
        <div class="fixed inset-0 bg-gray-950 -z-10">
            <div class="absolute inset-0 web3-grid opacity-20"></div>
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative min-h-screen">
            <!-- Navigation -->
            <nav class="sticky top-0 w-full z-50 glass-nav">
                <div class="max-w-7xl mx-auto px-6 py-4">
                    <div class="flex items-center justify-between">
                        <!-- Logo -->
                        <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl blur-lg opacity-75 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl p-2.5 shadow-2xl">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-white">Inventory</h1>
                                <p class="text-xs text-purple-300">NFTs</p>
                            </div>
                        </a>

                        <!-- Nav Links -->
                        <div class="hidden md:flex items-center space-x-8">
                            <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors text-sm font-medium">Home</a>
                            <a href="{{ route('public.products') }}" class="text-white font-semibold text-sm">Products</a>
                            <a href="{{ url('/#about') }}" class="text-gray-300 hover:text-white transition-colors text-sm font-medium">About</a>
                        </div>

                        <!-- Auth Buttons -->
                        @if (Route::has('login'))
                            <div class="flex items-center space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors text-sm font-medium">
                                        Log in
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                            Get Started
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </nav>

            <!-- Livewire Component -->
            <livewire:public-products />

            <!-- Footer -->
            <footer class="py-12 px-6 border-t border-gray-800">
                <div class="max-w-7xl mx-auto text-center">
                    <p class="text-gray-500 text-sm">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </p>
                </div>
            </footer>
        </div>

        <!-- Custom Pagination Styles -->
        <style>
            .pagination {
                display: flex;
                gap: 0.5rem;
                align-items: center;
            }
            
            .pagination a,
            .pagination span {
                padding: 0.5rem 1rem;
                border-radius: 0.75rem;
                font-weight: 600;
                transition: all 0.2s;
            }
            
            .pagination a {
                color: #d1d5db;
                background: rgba(139, 92, 246, 0.1);
                border: 1px solid rgba(139, 92, 246, 0.2);
            }
            
            .pagination a:hover {
                background: rgba(139, 92, 246, 0.2);
                color: white;
                transform: translateY(-2px);
            }
            
            .pagination .active span {
                background: linear-gradient(to right, #8b5cf6, #ec4899);
                color: white;
                border: 1px solid transparent;
            }
            
            .pagination .disabled span {
                color: #4b5563;
                background: transparent;
                border: 1px solid #374151;
            }
        </style>
    </body>
</html>