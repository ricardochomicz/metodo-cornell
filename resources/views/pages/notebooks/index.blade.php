@extends('layout.app')

@section('content')
    <x-breadcrumb :links="[['label' => 'Cadernos', 'url' => '/notebooks']]" />

    <livewire:notebooks.index />

@stop
