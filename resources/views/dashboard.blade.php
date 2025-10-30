<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">
                    Dashboard
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Welcome back! Here's a summary of your inventory.</p>
            </div>
        </div>
    </x-slot>

    <livewire:dashboard />
</x-app-layout>