<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Todo Form -->
                <form action="{{ route('todos.store') }}" method="POST" class="mb-6">
                    @csrf
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <input type="text" name="title" placeholder="Enter todo title" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex-1">
                            <input type="text" name="description" placeholder="Enter description"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                                Add Todo
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Todo List -->
                <div class="mt-6">
                    @foreach($todos as $todo)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg mb-4">
                        <div class="flex items-center gap-4 flex-1">
                            <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="flex items-center">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="{{ $todo->status === 'pending' ? 'completed' : 'pending' }}">
                                <button type="submit" class="mr-3">
                                    @if($todo->status === 'completed')
                                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @else
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" stroke-width="2" />
                                    </svg>
                                    @endif
                                </button>
                            </form>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold {{ $todo->status === 'completed' ? 'line-through text-gray-500' : '' }}">
                                    {{ $todo->title }}
                                </h3>
                                @if($todo->description)
                                <p class="text-gray-600">{{ $todo->description }}</p>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:text-red-900"
                                onclick="return confirm('Are you sure you want to delete this todo?')">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    @endforeach

                    @if($todos->isEmpty())
                    <p class="text-gray-500 text-center py-4">No todos yet. Add one above!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
