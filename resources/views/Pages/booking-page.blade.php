@extends('layouts.app')

@section('title', 'الحجز')

@section('content')
    @livewire('booking', ['productId' => $productId])

@endsection
