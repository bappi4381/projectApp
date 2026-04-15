 @extends('layouts.admin')
@section('title', 'Price List | Graphics Studio')

@section('content')
<div class="p-8">

    {{-- Simplified Header --}}
    <div class="mb-10 reveal">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Price List Control</h1>
        <p class="text-slate-400 font-medium text-sm">Manage visibility of primary services on the public pricing page.</p>
    </div>

    {{-- Search & Filter Bar --}}
    <div class="glass-card rounded-[24px] border-white/5 p-6 mb-6 flex flex-wrap gap-4 items-center reveal reveal-delay-1">
        <form action="{{ route('admin.graphics.price-list.index') }}" method="GET" class="flex flex-wrap gap-4 flex-1">
            <div class="relative flex-1 min-w-[300px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search service name..."
                    class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 pl-10 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
            </div>

            <select name="status" class="bg-slate-800/50 border border-white/5 rounded-xl px-6 py-3 text-sm text-slate-400 focus:outline-none focus:border-indigo-500/50 transition-all select-dark min-w-[180px]">
                <option value="">All Status</option>
                <option value="visible" {{ request('status') == 'visible' ? 'selected' : '' }}>Visible on Pricing</option>
                <option value="hidden" {{ request('status') == 'hidden' ? 'selected' : '' }}>Hidden from Pricing</option>
            </select>

            <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-[11px] font-black uppercase rounded-xl transition-all shadow-lg shadow-indigo-500/20">Filter</button>
            
            @if(request()->anyFilled(['search', 'status']))
                <a href="{{ route('admin.graphics.price-list.index') }}" class="px-6 py-3 bg-white/5 text-slate-400 hover:text-white text-[11px] font-black uppercase rounded-xl transition-all">Reset</a>
            @endif
        </form>
    </div>

    {{-- Simple Price List Table --}}
    <div class="glass-card rounded-[24px] border-white/5 shadow-2xl relative overflow-hidden reveal reveal-delay-2">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/[0.02] border-b border-white/5">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Service Name</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Price Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($services as $service)
                    <tr class="hover:bg-white/[0.01] transition-all group" 
                        x-data="{ isVisible: {{ $service->show_on_pricing ? 'true' : 'false' }}, isLoading: false }">
                        
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 flex items-center justify-center">
                                    <i class="{{ $service->icon ?? 'ri-image-line' }}"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white text-sm tracking-tight">{{ $service->name }}</h4>
                                    <p class="text-[10px] text-slate-500 italic">{{ $service->subCategory->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-8 py-5 text-center">
                            <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full transition-all border"
                                :class="isVisible ? 'bg-amber-500/10 text-amber-500 border-amber-500/20' : 'bg-slate-800 text-slate-500 border-white/5'"
                                x-text="isVisible ? 'Visible' : 'Hidden'">
                                {{ $service->show_on_pricing ? 'Visible' : 'Hidden' }}
                            </span>
                        </td>

                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end items-center gap-3">
                                <i x-show="isLoading" class="ri-loader-4-line animate-spin text-indigo-400 text-sm"></i>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="show_on_pricing" class="sr-only peer" 
                                        x-model="isVisible"
                                        @change="
                                            isLoading = true;
                                            fetch(`/admin/graphics/price-list/{{ $service->id }}/toggle-pricing`, {
                                                method: 'POST',
                                                headers: {
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                    'Content-Type': 'application/json'
                                                }
                                            })
                                            .then(res => res.json())
                                            .then(data => {
                                                isLoading = false;
                                                if(!data.success) isVisible = !isVisible; // Rollback on error
                                            })
                                            .catch(() => {
                                                isLoading = false;
                                                isVisible = !isVisible; // Rollback on error
                                            })
                                        ">
                                    <div class="w-11 h-6 bg-slate-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-500 shadow-lg transition-all"></div>
                                </label>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-20 text-center text-slate-500 font-medium">
                            No services found matching your criteria.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($services->hasPages())
            <div class="px-8 py-6 bg-white/[0.01] border-t border-white/5">
                {{ $services->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>

</div>

<style>
    /* Custom select styling for dark mode */
    .select-dark option {
        background-color: #0f172a;
        color: white;
    }
</style>
@endsection
