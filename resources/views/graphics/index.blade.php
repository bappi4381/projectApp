{{-- resources/views/graphics/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Graphics Studio | Professional Photo Editing & Retouching Services')
@section('meta_description', 'High-end photo editing services including clipping path, ghost mannequin, and jewelry retouching. Fast turnaround and guaranteed quality.')

@section('content')
    {{-- Graphics Studio Page Sections --}}
    @include('graphics.partials.hero')
    @include('graphics.partials.services')
    @include('graphics.partials.ecommerce')
    <!-- @include('graphics.partials.clients') -->
    @include('graphics.partials.process')
    @include('graphics.partials.pricing')
    @include('graphics.partials.testimonials')
    @include('graphics.partials.blog')

    {{-- Final CTA Section --}}
    <section class="relative py-24 bg-indigo-600 overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white/10 via-transparent to-transparent opacity-30"></div>
        </div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6">Ready to transform your product images?</h2>
            <p class="text-indigo-100 text-lg mb-10 max-w-2xl mx-auto">Join 500+ global brands and experience the difference of elite-level photo editing. Get your first 3 images edited for free.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#pricing" class="px-8 py-4 bg-white text-indigo-600 rounded-xl font-bold hover:bg-indigo-50 transition-all duration-300 transform hover:scale-105 shadow-xl shadow-black/20">
                    Get Started Now
                </a>
                <a href="mailto:hello@pixelforgegroup.com" class="px-8 py-4 bg-indigo-700 text-white rounded-xl font-bold border border-white/20 hover:bg-indigo-800 transition-all duration-300 transform hover:scale-105">
                    Contact Sales
                </a>
            </div>
        </div>
    </section>
@endsection
