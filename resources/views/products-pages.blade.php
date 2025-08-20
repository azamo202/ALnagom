@extends('layouts.app')

@section('title', 'زينة سيارات الأفراح')

@section('content')
    @livewire('products', ['id' => $id])

@endsection
