@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories ?? [], 'theme' => 'light'])
@endsection

@section('title', $service->name . ' | Story Boarding | Graphics Studio')

@section('content')
<div class="bg-[#f8fafc] min-h-screen text-slate-800 font-sans selection:bg-blue-500 selection:text-white overflow-x-hidden">
    {{-- Content will be provided by user --}}
    <div class="py-40 text-center">
        <h1 class="text-4xl font-black uppercase text-[#082f49]">{{ $service->name }} Details Page</h1>
        <p class="text-slate-500 mt-4">Content coming soon...</p>
    </div>
</div>
@endsection
