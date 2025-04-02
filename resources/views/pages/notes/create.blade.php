@extends('layout.app')

@section('content')
    <x-breadcrumb :links="[['label' => 'Cadernos', 'url' => '/notebooks']]" />

    {{-- <livewire:notes.form /> --}}
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        @include('pages.notes._partials.form')
    </form>

@stop
