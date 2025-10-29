<div>
    <!-- Hero Section -->
    <section class="pt-20 pb-12 px-6">
        <div class="max-w-7xl mx-auto text-center space-y-4 animate-fade-in">
            <h1 class="text-5xl md:text-6xl font-bold text-white">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">Products</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Explore our extensive catalog of premium products
            </p>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="pb-12 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="max-w-2xl mx-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search products by name or code..." 
                        class="w-full pl-12 pr-4 py-4 glass-card text-white placeholder-gray-500 rounded-2xl focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-300"
                    >
                    @if($search)
                        <button 
                            wire:click="$set('search', '')" 
                            class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-xl transition-all duration-200">
                            Clear
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="pb-20 px-6">
        <div class="max-w-7xl mx-auto">
            @if($products->count() > 0)
                <!-- Products Count -->
                <div class="mb-8 text-center">
                    <p class="text-gray-400">
                        Showing <span class="text-white font-semibold">{{ $products->count() }}</span> of 
                        <span class="text-white font-semibold">{{ $products->total() }}</span> products
                    </p>
                </div>

                <!-- Grid with Loading State -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12" wire:loading.class="opacity-50 pointer-events-none" wire:target="search">
                    @foreach($products as $product)
                        <div class="group glass-card rounded-2xl p-6 hover:scale-105 transition-all duration-300 cursor-pointer">
                            <!-- Product Avatar -->
                            <div class="w-16 h-16 mb-4 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg group-hover:scale-110 transition-transform">
                                {{ substr($product->name, 0, 2) }}
                            </div>

                            <!-- Product Code Badge -->
                            <div class="mb-3">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30">
                                    {{ $product->code }}
                                </span>
                            </div>

                            <!-- Product Name -->
                            <h3 class="text-lg font-bold text-white mb-2 truncate group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-purple-400 group-hover:to-pink-400 transition-all">
                                {{ $product->name }}
                            </h3>

                            <!-- Price -->
                            <div class="mb-3">
                                <div class="text-sm text-gray-400 mb-1">Price</div>
                                <div class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </div>
                            </div>

                            <!-- Quantity Badge -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-700">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                    <span class="text-sm text-gray-400">Stock:</span>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $product->qty > 50 ? 'bg-green-500/20 text-green-300 border border-green-500/30' : ($product->qty > 20 ? 'bg-yellow-500/20 text-yellow-300 border border-yellow-500/30' : 'bg-red-500/20 text-red-300 border border-red-500/30') }}">
                                    {{ $product->qty }}
                                </span>
                            </div>

                            <!-- Total Value -->
                            <div class="mt-3 pt-3 border-t border-gray-700">
                                <div class="text-xs text-gray-400 mb-1">Total Value</div>
                                <div class="text-sm font-semibold text-green-400">
                                    Rp {{ number_format($product->harga * $product->qty, 0, ',', '.') }}
                                </div>
                            </div>

                            <!-- View Details (for authenticated users) -->
                            @auth
                                <div class="mt-4">
                                    <a href="{{ route('products') }}" class="block w-full text-center px-4 py-2 bg-purple-600/20 hover:bg-purple-600/30 text-purple-300 font-semibold rounded-lg transition-colors duration-200 text-sm border border-purple-500/30">
                                        Manage Product
                                    </a>
                                </div>
                            @endauth
                        </div>
                    @endforeach
                </div>

                <!-- Loading Indicator -->
                <div wire:loading wire:target="search" class="text-center mb-8">
                    <div class="inline-flex items-center px-6 py-3 glass-card rounded-xl">
                        <svg class="animate-spin h-5 w-5 text-purple-500 mr-3" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span class="text-white font-semibold">Searching...</span>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    <div class="glass-card rounded-2xl p-4">
                        {{ $products->links() }}
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="glass-card rounded-2xl p-12 max-w-md mx-auto">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">No Products Found</h3>
                        <p class="text-gray-400 mb-6">
                            @if($search)
                                No products match your search "{{ $search }}"
                            @else
                                There are no products available yet
                            @endif
                        </p>
                        @if($search)
                            <button wire:click="$set('search', '')" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-xl transition-all duration-200">
                                Clear Search
                            </button>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    @guest
        <section class="py-20 px-6 bg-gradient-to-b from-transparent to-purple-900/20">
            <div class="max-w-4xl mx-auto text-center">
                <div class="glass-card rounded-3xl p-12">
                    <h2 class="text-4xl font-bold text-white mb-4">Want to Manage Products?</h2>
                    <p class="text-gray-400 text-lg mb-8">
                        Create an account to access full inventory management features
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold rounded-xl shadow-2xl hover:shadow-purple-500/50 transform hover:-translate-y-1 transition-all duration-300">
                            Get Started Free
                        </a>
                        <a href="{{ route('login') }}" class="px-8 py-4 glass-card text-white font-semibold rounded-xl hover:bg-white/10 transition-all duration-300">
                            Sign In
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endguest
</div>