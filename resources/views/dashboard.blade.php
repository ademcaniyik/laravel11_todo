<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-custom-olive dark:text-custom-beige leading-tight">
            {{ __('Todo Listesi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="mb-4 px-4 py-2 bg-custom-beige border border-custom-olive text-custom-olive rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 px-4 py-2 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Todo Form -->
                <form action="{{ route('todos.store') }}" method="POST" class="mb-8">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-custom-olive dark:text-custom-beige">Başlık</label>
                            <input type="text" name="title" id="title" required
                                class="mt-2 block w-full rounded-md border-custom-olive shadow-sm focus:border-custom-olive focus:ring-custom-olive bg-custom-beige dark:bg-gray-700 dark:border-custom-olive dark:text-custom-beige"
                                placeholder="Yapılacak iş başlığı">
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-custom-olive dark:text-custom-beige">Açıklama</label>
                            <textarea name="description" id="description" rows="3"
                                class="mt-2 block w-full rounded-md border-custom-olive shadow-sm focus:border-custom-olive focus:ring-custom-olive bg-custom-beige dark:bg-gray-700 dark:border-custom-olive dark:text-custom-beige"
                                placeholder="Yapılacak işin açıklaması"></textarea>
                        </div>
                        <div class="flex justify-center mt-8">
                            <button type="submit"
                                class="px-6 py-3 bg-custom-olive border border-transparent rounded-md font-semibold text-sm text-custom-beige uppercase tracking-widest hover:bg-opacity-90 focus:bg-opacity-100 active:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-custom-olive focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg">
                                Ekle
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Todo List -->
                <div class="mt-8">
                    @if(isset($todos) && count($todos) > 0)
                        @foreach($todos as $todo)
                            <div class="flex items-center justify-between p-4 bg-custom-beige dark:bg-gray-700 rounded-lg mb-4 hover:shadow-md transition-shadow duration-200 border border-custom-olive/20">
                                <div class="flex items-center gap-4 flex-1">
                                    <form action="{{ route('todos.update', ['todo' => $todo->id]) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="{{ $todo->status === 'completed' ? 'pending' : 'completed' }}">
                                        <button type="submit" class="mr-3">
                                            @if($todo->status === 'completed')
                                                <svg class="w-6 h-6 text-custom-olive" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6 text-custom-olive/50 hover:text-custom-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="10" stroke-width="2" />
                                                </svg>
                                            @endif
                                        </button>
                                    </form>

                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold {{ $todo->status === 'completed' ? 'line-through text-custom-olive/50' : 'text-custom-olive' }}">
                                            {{ $todo->title }}
                                        </h3>
                                        @if($todo->description)
                                            <p class="text-custom-olive/80 dark:text-custom-beige/80 mt-1">{{ $todo->description }}</p>
                                        @endif
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Bu todo\'yu silmek istediğinizden emin misiniz?')"
                                                class="text-custom-olive/70 hover:text-red-600 transition-colors duration-200">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        @if(method_exists($todos, 'links'))
                            <div class="mt-6">
                                {{ $todos->links() }}
                            </div>
                        @endif
                    @else
                        <p class="text-center text-custom-olive dark:text-custom-beige py-8">Henüz todo eklenmemiş.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
