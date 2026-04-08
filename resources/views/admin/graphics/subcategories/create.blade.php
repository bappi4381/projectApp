@extends('layouts.admin')
@section('title', 'Create Sub-Category | Graphics Studio')

@section('content')
<div class="p-8">
    <div class="mb-10 reveal">
        <a href="{{ route('admin.graphics.subcategories.index') }}" class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center gap-2 mb-4">
            <i class="ri-arrow-left-line"></i> Back to Sub-Categories
        </a>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Create Sub-Group</h1>
        <p class="text-slate-400 font-medium">Link a new sub-group to a primary category.</p>
    </div>

    @if ($errors->any())
        <div class="bg-rose-500/10 border border-rose-500/20 text-rose-500 px-6 py-4 rounded-xl mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="glass-card rounded-[32px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-1 p-10 max-w-2xl">
        <form action="{{ route('admin.graphics.subcategories.store') }}" method="POST" class="space-y-8">
            @csrf

            <div>
                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Parent Category</label>
                <select name="category_id" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all select-dark">
                    <option value="">Select Primary Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-[11px] uppercase tracking-widest font-black text-slate-500 mb-3 ml-1">Sub-Group Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Clipping Path" required 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:outline-none focus:border-indigo-500 transition-all">
            </div>

            <div class="flex justify-end gap-4 pt-6">
                <a href="{{ route('admin.graphics.subcategories.index') }}" class="px-8 py-4 bg-slate-900 border border-white/5 rounded-2xl text-slate-400 font-bold hover:bg-slate-800 transition-all text-sm">Cancel</a>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-widest text-[11px] rounded-2xl transition-all shadow-xl shadow-indigo-500/20 active:scale-95">
                    Save Sub-Group
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
