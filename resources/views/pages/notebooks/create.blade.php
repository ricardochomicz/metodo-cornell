@extends('layout.app')

@section('content')

    <x-breadcrumb :links="[['label' => 'Cadernos', 'url' => '/notebooks'], ['label' => 'Novo Caderno']]" />

    <form class="mt-5 bg-gray-50 p-6 rounded-lg shadow-md max-w-md mx-auto" action="{{ route('notebooks.store') }}"
        method="POST">
        @csrf
        @include('pages.notebooks._partials.form')
    </form>
@stop
