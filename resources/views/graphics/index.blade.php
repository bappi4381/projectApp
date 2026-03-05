{{-- resources/views/graphics/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Graphics Studio | Professional Photo Editing & Retouching Services')
@section('meta_description', 'High-end photo editing services including clipping path, ghost mannequin, and jewelry retouching. Fast turnaround and guaranteed quality.')

@section('content')
    {{-- Graphics Studio Page Sections --}}
    @include('graphics.partials.hero')
    @include('graphics.partials.services')
    @include('graphics.partials.ecommerce')
    @include('graphics.partials.comparison')
    @include('graphics.partials.pricing')
    @include('graphics.partials.process')
    @include('graphics.partials.testimonials')
    @include('graphics.partials.clients')
    @include('graphics.partials.blog')
    {{-- Footer is globally handled in app.blade.php layout --}}
@endsection
