@extends('layouts.admin')

@section('title', 'Manage Quotes & Payments')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2">Quotes & Payments</h1>
            <p class="text-slate-400">Manage your quote requests and track payments professionally.</p>
        </div>
        <div class="flex gap-4">
            <div class="glass-card px-4 py-2 rounded-xl flex items-center gap-3 border-white/5">
                <div class="w-2 h-2 rounded-full bg-yellow-400 shadow-[0_0_8px_#fbbf24]"></div>
                <span class="text-xs font-bold text-slate-300">{{ $quotes->where('status', 'pending')->count() }} Pending</span>
            </div>
            <div class="glass-card px-4 py-2 rounded-xl flex items-center gap-3 border-white/5">
                <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_#34d399]"></div>
                <span class="text-xs font-bold text-slate-300">{{ $quotes->where('status', 'completed')->count() }} Paid</span>
            </div>
        </div>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden border-white/5 shadow-[0_20px_50px_rgba(0,0,0,0.3)]">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/5 bg-white/[0.02]">
                        <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Invoice ID</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Client Details</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Date Submitted</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Amount</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($quotes as $quote)
                        <tr class="group hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-indigo-500/10 flex items-center justify-center text-indigo-400 group-hover:scale-110 transition-transform">
                                        <i class="ri-file-list-3-line"></i>
                                    </div>
                                    <span class="font-bold text-white tracking-tight">{{ $quote->invoice_id }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-200">{{ $quote->payer_name }}</span>
                                    <span class="text-xs text-slate-500">{{ $quote->payer_email }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-sm text-slate-400">
                                {{ $quote->created_at->format('d M, Y') }}
                                <span class="block text-[10px] opacity-50 font-black tracking-widest">{{ $quote->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-sm font-black text-white tracking-tight">${{ number_format($quote->amount, 2) }}</span>
                            </td>
                            <td class="px-6 py-5">
                                @if($quote->status === 'pending')
                                    <div class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md bg-yellow-500/10 text-yellow-500 border border-yellow-500/20 text-[10px] font-black uppercase tracking-tighter">
                                        <div class="w-1 h-1 rounded-full bg-yellow-500 animate-pulse shadow-[0_0_8px_#eab308]"></div>
                                        Pending
                                    </div>
                                @elseif($quote->status === 'completed')
                                    <div class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 text-[10px] font-black uppercase tracking-tighter">
                                        <div class="w-1 h-1 rounded-full bg-emerald-500 shadow-[0_0_8px_#10b981]"></div>
                                        Completed
                                    </div>
                                @else
                                    <div class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md bg-slate-500/10 text-slate-400 border border-white/5 text-[10px] font-black uppercase tracking-tighter">
                                        {{ $quote->status }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.graphics.quotes.edit', $quote->id) }}" 
                                       class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-400 hover:bg-indigo-500 hover:text-white transition-all shadow-lg hover:shadow-indigo-500/40"
                                       title="View Details">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <form action="{{ route('admin.graphics.quotes.destroy', $quote->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this record permanently?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-500 hover:bg-rose-500 hover:text-white transition-all shadow-lg hover:shadow-rose-500/40" title="Delete">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-600 border border-white/5">
                                        <i class="ri-inbox-line text-2xl"></i>
                                    </div>
                                    <p class="text-slate-500 font-medium">No records found yet.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($quotes->hasPages())
            <div class="p-6 border-t border-white/5 bg-white/[0.01]">
                {{ $quotes->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
