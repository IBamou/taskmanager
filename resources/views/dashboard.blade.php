<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        <div class="text-3xl font-bold">{{ auth()->user()->categories->count() }}</div>
                        <div class="text-indigo-100 mt-1">Total Categories</div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        <div class="text-3xl font-bold">{{ auth()->user()->categories->flatMap->tasks->count() }}</div>
                        <div class="text-emerald-100 mt-1">Total Tasks</div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-orange-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        <div class="text-3xl font-bold">{{ auth()->user()->categories->flatMap->tasks->where('status', 'pending')->count() }}</div>
                        <div class="text-amber-100 mt-1">Pending Tasks</div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Welcome to Task Manager!</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Organize your tasks into categories and stay productive.</p>
                    <a href="{{ route('categories.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Go to Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>