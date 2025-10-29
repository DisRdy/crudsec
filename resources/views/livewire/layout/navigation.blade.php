<div class="sidebar-container h-full">
    <!-- Logo / Brand Section -->
    <div class="sidebar-brand">
        <div class="flex items-center space-x-3">
            <div class="brand-logo">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div>
                <h1 class="brand-title">Inventory</h1>
                <p class="brand-subtitle">NFTs</p>
            </div>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="sidebar-nav">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           wire:navigate
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg class="nav-link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="nav-link-text">Dashboard</span>
            @if(request()->routeIs('dashboard'))
                <svg class="nav-link-arrow" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>

        <!-- Products -->
        <a href="{{ route('products') }}" 
           wire:navigate
           class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}">
            <svg class="nav-link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <span class="nav-link-text">Produk</span>
            @if(request()->routeIs('products'))
                <svg class="nav-link-arrow" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>

        <!-- Divider -->
        <div class="nav-divider">
            <div class="nav-divider-line"></div>
        </div>

        <!-- Section Label -->
        <div class="nav-section-label">
            <span class="nav-section-text">Account</span>
        </div>

        <!-- Profile -->
        <a href="{{ route('profile') }}" 
           wire:navigate
           class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
            <svg class="nav-link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span class="nav-link-text">Profile</span>
            @if(request()->routeIs('profile'))
                <svg class="nav-link-arrow" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-logout">
                <svg class="nav-link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span class="nav-link-text">Log Out</span>
            </button>
        </form>
    </nav>

    <!-- User Info Card -->
    <div class="user-info-card">
        <div class="user-info-content">
            <!-- Avatar -->
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            
            <!-- User Details -->
            <div class="user-details">
                <p class="user-name">
                    {{ auth()->user()->name }}
                </p>
                <p class="user-email">
                    {{ auth()->user()->email }}
                </p>
            </div>

            <!-- Settings Icon -->
            <a href="{{ route('profile') }}" class="user-settings-btn">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Version Info -->
    <div class="sidebar-footer">
        <div class="version-info mt-8">
        </div>
    </div>
</div>