@extends('layouts.admin')
@section('title', 'Graphics Studio Admin')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2">Graphics Studio Dashboard</h1>
            <p class="text-slate-400">Welcome to your creative management workspace.</p>
        </div>
        <a href="{{ route('admin.service-selection') }}" class="py-2 px-4 bg-slate-900 border border-white/5 rounded-xl hover:bg-slate-800 transition-all text-sm font-semibold flex items-center gap-2">
            <i class="ri-arrow-left-line"></i>
            <span>Switch Service</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="glass-card rounded-2xl p-6 border-white/5">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-lg bg-indigo-500/10 flex items-center justify-center text-indigo-400">
                    <i class="ri-gallery-line text-xl"></i>
                </div>
                <h3 class="font-bold text-lg">Portfolio Items</h3>
            </div>
            <p class="text-4xl font-black text-white mb-2">42</p>
            <p class="text-xs text-slate-500 font-medium">+12 from last month</p>
        </div>
        <div class="glass-card rounded-2xl p-6 border-white/5">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-lg bg-emerald-500/10 flex items-center justify-center text-emerald-400">
                    <i class="ri-service-line text-xl"></i>
                </div>
                <h3 class="font-bold text-lg">Active Services</h3>
            </div>
            <p class="text-4xl font-black text-white mb-2">{{ str_pad($services_count, 2, '0', STR_PAD_LEFT) }}</p>
            <p class="text-xs text-slate-500 font-medium">All systems operational</p>
        </div>
        <div class="glass-card rounded-2xl p-6 border-white/5">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-lg bg-amber-500/10 flex items-center justify-center text-amber-400">
                    <i class="ri-chat-quote-line text-xl"></i>
                </div>
                <h3 class="font-bold text-lg">Pending Quotes</h3>
            </div>
            <p class="text-4xl font-black text-white mb-2">08</p>
            <p class="text-xs text-slate-500 font-medium">Requires immediate attention</p>
        </div>
    </div>
</div>
@endsection
