<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-white rounded-2xl shadow-md p-6">

        <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
            <div class="flex items-center w-full sm:w-auto mb-4 sm:mb-0">
                <input type="text" wire:model.live="search" placeholder="Buscar caderno..."
                    class="w-full sm:w-64 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <button wire:click="clearFilter"
                    class="ml-2 bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-gray-700 transition duration-300 ease-in-out">
                    Limpar
                </button>
            </div>

            <a href="{{ route('notebooks.create') }}"
                class="ml-0 sm:ml-4 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition duration-300 ease-in-out">
                Novo Caderno
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($data as $notebook)
                <div
                    class="bg-gray-50 border border-gray-300 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out">
                    <div
                        class="p-4 {{ $notebook->is_favorite ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800' }}">
                        <h3 class="text-lg font-semibold">{{ $notebook->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $notebook->slug }}</p>
                    </div>

                    <div class="p-4">
                        <p class="text-gray-700 text-sm">Criado em: {{ $notebook->created_at->format('d/m/Y') }}</p>
                        <small>{{ $notebook->notes->count() }} nota(s)</small>
                    </div>

                    <div class="p-4 bg-gray-100 flex justify-between items-center">
                        <div class="flex space-x-2">
                            <a href="{{ route('notebooks.edit', $notebook->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg transition duration-300 ease-in-out flex items-center">
                                <i class="fas fa-sync-alt"></i>
                            </a>

                            <a href="{{ route('notebooks.notes', $notebook->uuid) }}"
                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg transition duration-300 ease-in-out flex items-center">
                                <i class="fas fa-book-open"></i>
                            </a>

                            <a href="{{ route('notebooks.destroy', $notebook->id) }}"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg transition duration-300 ease-in-out flex items-center">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        <button wire:click="toggleFavorite({{ $notebook->id }})"
                            class="text-yellow-500 hover:text-yellow-400">
                            <i class="{{ $notebook->is_favorite ? 'fas fa-star' : 'far fa-star' }} text-xl"></i>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center text-gray-500 py-6">
                    Nenhum caderno encontrado
                </div>
            @endforelse
        </div>

        <div class="mt-8 flex justify-center">
            {{ $data->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
