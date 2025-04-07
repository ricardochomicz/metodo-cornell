<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <div class="flex items-center mb-6">
            <a href="{{ route('notebooks.index') }}"
                class="text-blue-600 hover:text-blue-700 transition duration-300 ease-in-out mr-4">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h1 class="text-2xl font-semibold text-gray-900">

                Anotações caderno - {{ $notebook->title }}
            </h1>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
            <div class="flex items-center w-full sm:w-auto">
                <input type="search" wire:model.live="search" name="search" placeholder="Buscar anotação..."
                    class="w-full sm:w-64 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <button wire:click="clearFilter"
                    class="ml-2 bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-gray-700 transition duration-300 ease-in-out">
                    Limpar
                </button>
            </div>
            <a href="{{ route('notes.create', $uuid) }}"
                class="mt-4 sm:mt-0 ml-0 sm:ml-4 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition duration-300 ease-in-out">
                Criar Anotação
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($data as $note)
                <div
                    class="bg-white border border-gray-300 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>

                                <h2 class="text-lg font-semibold text-gray-900 mb-1">
                                    {{ $note->title }}</h2>
                                <p class="text-sm text-gray-600">{{ $note->created_at->format('d/m/Y') }}</p>
                            </div>
                            <button wire:click="toggleImportant({{ $note->id }})"
                                class="text-yellow-500 hover:text-yellow-400">
                                <i class="{{ $note->is_important ? 'fas fa-star' : 'far fa-star' }} text-xl"></i>
                            </button>
                        </div>
                        <p class="text-gray-700 bg-gray-100 p-2 rounded-lg text-sm mb-4">
                            {{ Str::limit($note->summary, 80, '...') }}
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-semibold">#{{ $note->id }}</span>
                            <div class="flex space-x-2">

                                <a href="{{ route('notes.show', ['uuid' => $uuid, 'id' => $note->id]) }}"
                                    class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-2 rounded-lg transition duration-300 ease-in-out">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('notes.edit', $note->id) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg transition duration-300 ease-in-out">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                                <form method="POST" action="{{ route('notes.destroy', $note->id) }}"
                                    onsubmit="return confirm('Deseja excluir essa anotação?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg transition duration-300 ease-in-out">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 flex justify-center">
            {{ $data->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
