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
        <div class="min-h-screen flex bg-gray-50 dark:bg-gray-950">
            <!-- Left Side - Decorative -->
            <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-purple-600 via-pink-500 to-purple-700 relative overflow-hidden">
                <!-- Animated Background Circles -->
                <div class="absolute top-0 left-0 w-96 h-96 bg-white opacity-10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-white opacity-10 rounded-full translate-x-1/3 translate-y-1/3"></div>
                <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-white opacity-5 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
                
                <!-- Content -->
                <div class="relative z-10 flex flex-col justify-center items-center w-full p-12 text-white">
                    <div class="max-w-md space-y-6 animate-fade-in">
                        <!-- Logo -->
                        <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-2xl p-6 shadow-2xl">
                            <div class="flex items-center justify-center space-x-3">
                                <div class="bg-white rounded-xl p-3 shadow-lg">
                                    <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-2xl font-bold">Inventory</h1>
                                    <p class="text-sm text-purple-100">Management System</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Features -->
                        <div class="space-y-4">
                            <h2 class="text-3xl font-bold">Kelola Inventory dengan Mudah</h2>
                            <p class="text-purple-100 text-lg">Sistem manajemen inventory modern untuk bisnis Anda</p>
                            
                            <div class="space-y-3 mt-8">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-white bg-opacity-20 rounded-lg p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <span>Dashboard Real-time</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="bg-white bg-opacity-20 rounded-lg p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <span>Manajemen Produk</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="flex-1 flex flex-col justify-center px-6 py-12 lg:px-16 xl:px-20">
                <div class="mx-auto w-full max-w-md animate-fade-in">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden mb-8 text-center">
                        <div class="inline-flex items-center justify-center space-x-3 bg-gradient-to-br from-purple-600 to-pink-500 text-white rounded-2xl px-6 py-4 shadow-xl">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <div class="text-left">
                                <h1 class="text-xl font-bold">Inventory</h1>
                                <p class="text-xs text-purple-100">Management System</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="px-8 py-10">
                            {{ $slot }}
                        </div>
                    </div>

                    <!-- Footer -->
                    <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>