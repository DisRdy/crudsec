<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} - Inventory Management</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans overflow-x-hidden">
        <!-- Background -->
        <div class="fixed inset-0 bg-gray-950 -z-10">
            <!-- Animated Grid -->
            <div class="absolute inset-0 web3-grid opacity-30"></div>
            
            <!-- Gradient Orbs -->
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative min-h-screen">
            <!-- Navigation -->
            <nav class="fixed top-0 w-full z-50 glass-nav">
                <div class="max-w-7xl mx-auto px-6 py-4">
                    <div class="flex items-center justify-between">
                        <!-- Logo -->
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl blur-lg opacity-75"></div>
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
                        </div>

                        <!-- Nav Links -->
                        <div class="hidden md:flex items-center space-x-8">
                            <a href="#features" class="text-gray-300 hover:text-white transition-colors text-sm font-medium">Features</a>
                            <a href="{{ route('public.products') }}" class="text-gray-300 hover:text-white transition-colors text-sm font-medium">Products</a>
                            <a href="#about" class="text-gray-300 hover:text-white transition-colors text-sm font-medium">About</a>
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

            <!-- Hero Section -->
            <section class="pt-32 pb-20 px-6">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center space-y-8 animate-fade-in">
                        <!-- Badge -->
                        <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-5 backdrop-blur-lg border border-purple-500/20 rounded-full">
                            <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                            <span class="text-sm text-gray-300">Next-Gen Inventory System</span>
                        </div>

                        <!-- Main Heading -->
                        <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight">
                            Manage Inventory
                            <br/>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 animate-gradient">
                                Like Never Before
                            </span>
                        </h1>

                        <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                            Experience the future of inventory management with our cutting-edge Web3-inspired platform. Fast, secure, and incredibly powerful.
                        </p>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-8">
                            @guest
                                <a href="{{ route('register') }}" class="group px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold rounded-xl shadow-2xl hover:shadow-purple-500/50 transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2">
                                    <span>Start Free Trial</span>
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                                <a href="#features" class="px-8 py-4 bg-white bg-opacity-5 backdrop-blur-lg border border-purple-500/30 text-white font-semibold rounded-xl hover:bg-opacity-10 transition-all duration-300">
                                    Learn More
                                </a>
                            @else
                                <a href="{{ url('/dashboard') }}" class="group px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold rounded-xl shadow-2xl hover:shadow-purple-500/50 transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2">
                                    <span>Go to Dashboard</span>
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                            @endguest
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-8 pt-16 max-w-3xl mx-auto">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">99.9%</div>
                                <div class="text-sm text-gray-400 mt-2">Uptime</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">10K+</div>
                                <div class="text-sm text-gray-400 mt-2">Products</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">24/7</div>
                                <div class="text-sm text-gray-400 mt-2">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section id="features" class="py-20 px-6">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-16">
                        <h2 class="text-4xl font-bold text-white mb-4">Powerful Features</h2>
                        <p class="text-gray-400 text-lg">Everything you need to manage your inventory efficiently</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="group glass-card p-8 rounded-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Real-time Updates</h3>
                            <p class="text-gray-400">Track inventory changes instantly with live synchronization across all devices.</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="group glass-card p-8 rounded-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Advanced Analytics</h3>
                            <p class="text-gray-400">Get insights with powerful analytics and detailed reports on your inventory.</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="group glass-card p-8 rounded-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
                            <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-3">Secure & Safe</h3>
                            <p class="text-gray-400">Enterprise-grade security to keep your inventory data protected 24/7.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Products Preview Section -->
            <section id="products" class="py-20 px-6 bg-gradient-to-b from-transparent to-purple-900/10">
                <div class="max-w-7xl mx-auto text-center">
                    <h2 class="text-4xl font-bold text-white mb-4">Explore Products</h2>
                    <p class="text-gray-400 text-lg mb-12">Discover our extensive product catalog</p>
                    
                    <a href="{{ route('public.products') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold rounded-xl shadow-2xl hover:shadow-purple-500/50 transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        View All Products
                    </a>
                </div>
            </section>

            <!-- About Section -->
            <section id="about" class="py-20 px-6">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-4xl font-bold text-white mb-6">About Our Platform</h2>
                    <p class="text-gray-400 text-lg leading-relaxed mb-8">
                        Built with cutting-edge technology and modern design principles, our inventory management system helps businesses of all sizes streamline their operations. From small startups to enterprise solutions, we've got you covered.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <span class="px-4 py-2 bg-purple-500/20 text-purple-300 rounded-full text-sm border border-purple-500/30">Laravel 11</span>
                        <span class="px-4 py-2 bg-pink-500/20 text-pink-300 rounded-full text-sm border border-pink-500/30">Livewire 3</span>
                        <span class="px-4 py-2 bg-blue-500/20 text-blue-300 rounded-full text-sm border border-blue-500/30">Tailwind CSS</span>
                        <span class="px-4 py-2 bg-purple-500/20 text-purple-300 rounded-full text-sm border border-purple-500/30">Real-time</span>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="py-12 px-6 border-t border-gray-800">
                <div class="max-w-7xl mx-auto text-center">
                    <p class="text-gray-500 text-sm">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        <span class="mx-2">•</span>
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>