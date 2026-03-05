{{-- resources/views/graphics/services.blade.php --}}
@extends('layouts.app')
@section('title', 'Our Services | Graphics Studio')

@section('content')
    <div class="pt-24 min-h-screen">
        @include('graphics.partials.services')
        @include('graphics.partials.process')
    </div>
@endsection
