@extends('layout.app')

@section('content')
    <x-breadcrumb :links="[['label' => 'Cadernos', 'url' => '/notebooks']]" />

    {{-- <livewire:notes.form /> --}}
    <form action="{{ route('notes.update', @$data->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pages.notes._partials.form')
    </form>
    <div id="loading-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-white text-3xl font-bold">
            Aguarde, salvando...
        </div>
    </div>
@stop

@push('scripts')
    <script>
        function showLoading() {
            // document.getElementById('submit-btn').disabled = true; // Desabilita o botão
            document.getElementById('loading-overlay').classList.remove('hidden'); // Exibe o overlay
        }
    </script>
@endpush
