@extends('layout.app')

@section('content')
    <div class="p-6 bg-white shadow-lg rounded-lg mt-5">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
            <h1 class="text-xl font-bold text-gray-800 mb-2 sm:mb-0">
                Nova Anotação - Caderno {{ @$notebook->title ?? @$data->notebook->title }}
            </h1>
            <a href="{{ route('notebooks.notes', @$notebook->uuid ?? @$data->notebook->uuid) }}"
                class="px-4 py-2 bg-gray-300 rounded-lg text-gray-700 hover:bg-gray-400 transition">
                <i class="fas fa-chevron-left"></i> Voltar
            </a>
        </div>
        <div class="mb-4">
            <h1 class="text-xl font-bold text-gray-800">
                {{ $note->title }} - {{ $note->created_at->format('d/m/Y') }}
            </h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                <h2 class="text-blue-500 font-semibold">Tópicos</h2>
                <div class="p-2 rounded-lg mt-2">
                    <textarea class="w-full bg-gray-100 h-96 p-2 rounded-lg resize-none min-h-[3rem]"
                        placeholder="Adicione suas anotações...">{{ @$note->keywords }}</textarea>
                </div>
            </div>

            <div class="sm:col-span-2 bg-gray-100 p-4 rounded-lg shadow-sm">
                <h2 class="text-blue-500 font-semibold">Anotações</h2>
                <div class="p-2 rounded-lg mt-2">
                    <textarea class="w-full bg-gray-100 h-96 p-2 rounded-lg resize-none min-h-[3rem]"
                        placeholder="Adicione suas anotações...">{{ @$note->content }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 p-4 rounded-lg shadow-sm mt-4">
            <h2 class="text-blue-500 font-semibold">Resumo</h2>
            {{ $note->summary }}
        </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center mt-6">
        @php
            $previousNote = $notebook->notes()->where('id', '<', $note->id)->orderBy('id', 'desc')->first();
            $nextNote = $notebook->notes()->where('id', '>', $note->id)->orderBy('id')->first();
        @endphp

        @if ($previousNote)
            <a href="{{ route('notes.show', ['uuid' => $notebook->uuid, 'id' => $previousNote->id]) }}"
                class="px-4 py-2 bg-gray-300 rounded-lg text-gray-700 hover:bg-gray-400 transition mb-2 sm:mb-0">Anterior</a>
        @else
            <span class="px-4 py-2 text-gray-400 mb-2 sm:mb-0">Anterior</span>
        @endif

        @if ($nextNote)
            <a href="{{ route('notes.show', ['uuid' => $notebook->uuid, 'id' => $nextNote->id]) }}"
                class="px-4 py-2 bg-gray-300 rounded-lg text-gray-700 hover:bg-gray-400 transition">Próximo</a>
        @else
            <span class="px-4 py-2 text-gray-400">Próximo</span>
        @endif
    </div>
@stop

@push('styles')
    <style>
        #editor {
            background: #F3F4F6 !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new EasyMDE({
                element: document.getElementById("editor"),
                spellChecker: false,
                forceSync: true,
                toolbar: [],
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            new EasyMDE({
                element: document.getElementById("topics"),
                spellChecker: false,
                forceSync: true,
                toolbar: [],
            });
        });
    </script>
@endpush
