@extends('layouts.admin')
@section('title', 'Testimonials Control | Graphics Studio')

@section('content')
<div class="p-4 md:p-8 max-w-7xl mx-auto overflow-x-hidden">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12 reveal">
        <div>
            <h1 class="text-3xl md:text-4xl font-black text-white mb-2 tracking-tight">Client VOX</h1>
            <p class="text-slate-400 font-medium">Manage and curate the voices of our global partners.</p>
        </div>
        <a href="{{ route('admin.graphics.testimonials.create') }}" class="inline-flex items-center gap-2 py-3.5 px-6 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-[0.2em] text-xs rounded-2xl transition-all shadow-xl shadow-indigo-500/20 active:scale-95 group">
            <i class="ri-add-line transition-transform group-hover:rotate-90"></i>
            <span>Register Quote</span>
        </a>
    </div>

    {{-- Testimonials Table --}}
    <div class="glass-card rounded-[2.5rem] border-white/5 shadow-2xl relative overflow-hidden reveal">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/5 border-b border-white/5">
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none">Avatar</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none">Client Detail</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none">Excerpt</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none text-center">Score</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-white/[0.02] transition-all group">
                        <td class="px-8 py-6">
                            <img src="{{ $testimonial->avatar ? asset('storage/' . $testimonial->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($testimonial->name).'&background=312e81&color=fff' }}" 
                                 class="w-12 h-12 rounded-2xl object-cover border border-white/10 shadow-lg">
                        </td>
                        <td class="px-8 py-6">
                            <h4 class="font-bold text-white tracking-tight group-hover:text-indigo-400 transition-colors uppercase text-xs">{{ $testimonial->name }}</h4>
                            <p class="text-[10px] text-slate-500 font-medium mt-1">{{ $testimonial->designation ?? 'Verified Client' }}</p>
                        </td>
                        <td class="px-8 py-6">
                            <p class="text-[11px] text-slate-400 leading-relaxed font-medium line-clamp-1 max-w-xs">{{ $testimonial->content }}</p>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center justify-center gap-1 text-yellow-500 text-[10px]">
                                @for($i=0; $i<$testimonial->rating; $i++)
                                    <i class="ri-star-fill"></i>
                                @endfor
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.graphics.testimonials.edit', $testimonial) }}" class="w-10 h-10 rounded-xl bg-white/5 border border-white/5 text-slate-400 hover:text-white hover:bg-white/10 transition-all flex items-center justify-center">
                                    <i class="ri-edit-2-line text-lg"></i>
                                </a>
                                <form action="{{ route('admin.graphics.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this voice forever?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-10 h-10 rounded-xl bg-rose-500/5 border border-rose-500/10 text-rose-500/30 hover:text-rose-400 hover:bg-rose-500/10 transition-all flex items-center justify-center">
                                        <i class="ri-delete-bin-line text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-24 text-center">
                            <div class="flex flex-col items-center gap-4 text-slate-700">
                                <i class="ri-chat-quote-line text-6xl opacity-20"></i>
                                <p class="text-sm font-bold uppercase tracking-widest text-slate-500">Wait for your first review...</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($testimonials->hasPages())
        <div class="p-8 bg-white/5 border-t border-white/5 flex justify-center">
            {{ $testimonials->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
