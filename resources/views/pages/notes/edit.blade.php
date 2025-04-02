@extends('layout.app')

@section('content')
    <x-breadcrumb :links="[['label' => 'Cadernos', 'url' => '/notebooks']]" />

    {{-- <livewire:notes.form /> --}}
    <form action="{{ route('notes.update', @$data->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pages.notes._partials.form')
    </form>

@stop
