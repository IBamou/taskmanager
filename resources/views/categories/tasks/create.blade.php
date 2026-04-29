<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('categories.show', $category) }}" class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add Task to ' . $category->name) }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <form action="{{ route('categories.task.store', $category) }}" method="POST">
                        @csrf

                        <div class="mb-5">
                            <x-input-label for="title" :value="__('Task Title')" class="text-lg font-medium mb-2" />
                            <x-text-input id="title" name="title" type="text" class="w-full px-4 py-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg focus:ring-2 focus:ring-emerald-500" required autofocus placeholder="What needs to be done?" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div class="mb-5">
                            <x-input-label for="description" :value="__('Description')" class="text-lg font-medium mb-2" />
                            <textarea id="description" name="description" class="w-full px-4 py-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg focus:ring-2 focus:ring-emerald-500" rows="4" placeholder="Add more details (optional)..."></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                            <div>
                                <x-input-label for="due_date" :value="__('Due Date')" class="text-lg font-medium mb-2" />
                                <x-text-input id="due_date" name="due_date" type="date" class="w-full px-4 py-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg focus:ring-2 focus:ring-emerald-500" />
                                <x-input-error class="mt-2" :messages="$errors->get('due_date')" />
                            </div>
                            <div>
                                <x-input-label for="status" :value="__('Status')" class="text-lg font-medium mb-2" />
                                <select id="status" name="status" class="w-full px-4 py-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg focus:ring-2 focus:ring-emerald-500" required>
                                    <option value="pending">Pending</option>
                                    <option value="in-progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('status')" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <a href="{{ route('categories.show', $category) }}" class="px-6 py-3 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                Cancel
                            </a>
                            <x-primary-button class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700">
                                Create Task
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>