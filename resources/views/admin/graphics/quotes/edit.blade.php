@extends('layouts.admin')

@section('title', 'View & Edit Quote: ' . $quote->invoice_id)

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.graphics.quotes.index') }}" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 hover:bg-white/10 hover:text-white transition-all border border-white/5">
                <i class="ri-arrow-left-line"></i>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-white mb-1">Quote <span class="text-indigo-400">#{{ $quote->invoice_id }}</span></h1>
                <p class="text-xs font-black text-slate-500 uppercase tracking-[0.2em]">Management & Pricing</p>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
             @if($quote->status === 'pending')
                <div class="px-4 py-2 rounded-xl bg-yellow-500/10 text-yellow-500 border border-yellow-500/20 text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                    <div class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></div>
                    Awaiting Pricing
                </div>
            @else
                <div class="px-4 py-2 rounded-xl bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
                    Status: {{ strtoupper($quote->status) }}
                </div>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Details (Col 2) -->
        <div class="lg:col-span-2 space-y-8">
            {{-- Client Card --}}
            <div class="glass-card rounded-2xl p-8 border-white/5 relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/5 blur-3xl group-hover:bg-indigo-500/10 transition-all duration-700"></div>
                
                <h3 class="text-sm font-black text-slate-500 uppercase tracking-[0.2em] mb-6 flex items-center gap-2">
                    <i class="ri-user-3-line text-indigo-400"></i>
                    Client Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block opacity-60">Full Name</label>
                        <p class="text-lg font-bold text-white tracking-tight">{{ $quote->payer_name }}</p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block opacity-60">Email Address</label>
                        <p class="text-lg font-bold text-white tracking-tight">{{ $quote->payer_email }}</p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block opacity-60">Phone Number</label>
                        <p class="text-lg font-bold text-white tracking-tight">{{ $quote->payer_phone ?? 'Not Provided' }}</p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block opacity-60">Submission Date</label>
                        <p class="text-lg font-bold text-white tracking-tight">{{ $quote->created_at->format('d M Y, h:i A') }}</p>
                    </div>
                </div>
            </div>

            {{-- Request Details Card --}}
            <div class="glass-card rounded-2xl p-8 border-white/5">
                <h3 class="text-sm font-black text-slate-500 uppercase tracking-[0.2em] mb-6 flex items-center gap-2">
                    <i class="ri-draft-line text-indigo-400"></i>
                    Project Requirements
                </h3>

                <div class="space-y-8">
                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block opacity-60 mb-3">Services Requested</label>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $servicesList = explode(', ', str_replace('Quote Request. Services: ', '', $quote->notes));
                            @endphp
                            @foreach($servicesList as $s)
                                <span class="px-3 py-1.5 rounded-lg bg-white/5 border border-white/5 text-xs font-bold text-slate-200">
                                    {{ $s }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    @if(isset($quote->payment_details['instructions']))
                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block opacity-60 mb-2 text-indigo-300">Client Instructions</label>
                            <div class="bg-indigo-500/5 p-6 rounded-2xl border border-indigo-500/10 text-slate-300 text-sm leading-relaxed italic">
                                "{!! nl2br(e($quote->payment_details['instructions'])) !!}"
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4 border-t border-white/5">
                        @if(isset($quote->payment_details['return_type']))
                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block opacity-60 mb-1">Return File Type</label>
                            <span class="text-white font-bold">{{ $quote->payment_details['return_type'] }}</span>
                        </div>
                        @endif
                        @if(isset($quote->payment_details['website']))
                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block opacity-60 mb-1">Client Website</label>
                            <a href="{{ $quote->payment_details['website'] }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 font-bold flex items-center gap-1">
                                {{ $quote->payment_details['website'] }}
                                <i class="ri-external-link-line text-[10px]"></i>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Files Card --}}
            @if(isset($quote->payment_details['uploaded_files']) && count($quote->payment_details['uploaded_files']) > 0)
            <div class="glass-card rounded-2xl p-8 border-white/5">
                <h3 class="text-sm font-black text-slate-500 uppercase tracking-[0.2em] mb-6 flex items-center gap-2">
                    <i class="ri-attachment-line text-indigo-400"></i>
                    Uploaded Assets ({{ count($quote->payment_details['uploaded_files']) }})
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($quote->payment_details['uploaded_files'] as $index => $file)
                    <a href="{{ $file }}" target="_blank" 
                       class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-indigo-500/30 transition-all group">
                        <div class="w-10 h-10 rounded-lg bg-indigo-500/10 flex items-center justify-center text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-all">
                            <i class="ri-download-cloud-2-line text-xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Asset #{{ $index + 1 }}</span>
                            <span class="text-sm font-bold text-white">View / Download</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Payment Transaction Details --}}
            @if($quote->status === 'completed' || $quote->transaction_id)
            <div class="glass-card rounded-2xl overflow-hidden border-white/5 shadow-xl">
                <div class="p-8 border-b border-white/5 bg-white/[0.02]">
                    <h3 class="text-sm font-black text-emerald-400 uppercase tracking-[0.2em] flex items-center gap-2">
                        <i class="ri-bank-card-line"></i>
                        Payment Transaction Information
                    </h3>
                </div>
                
                <div class="p-0">
                    <table class="w-full text-left border-collapse">
                        <tbody class="divide-y divide-white/5">
                            <tr class="hover:bg-white/[0.01] transition-colors">
                                <td class="px-8 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest w-1/3">Transaction ID</td>
                                <td class="px-8 py-4">
                                    <span class="font-mono text-emerald-400 font-bold bg-emerald-400/10 px-3 py-1 rounded-md text-xs border border-emerald-400/20">
                                        {{ $quote->transaction_id }}
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-white/[0.01] transition-colors">
                                <td class="px-8 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Payment Method</td>
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-2 text-white font-bold">
                                        <i class="ri-paypal-fill text-blue-400 text-lg"></i>
                                        <span>PayPal</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-white/[0.01] transition-colors">
                                <td class="px-8 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Paid Amount</td>
                                <td class="px-8 py-4 text-white font-black text-lg">
                                    ${{ number_format($quote->amount, 2) }} <span class="text-[10px] text-slate-500 ml-1">USD</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-white/[0.01] transition-colors">
                                <td class="px-8 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Payment Date</td>
                                <td class="px-8 py-4 text-slate-200 font-bold">
                                    {{ $quote->paid_at ? $quote->paid_at->format('M d, Y | h:i A') : 'N/A' }}
                                </td>
                            </tr>
                            @if(isset($quote->payment_details['payer']))
                            <tr class="hover:bg-white/[0.01] transition-colors">
                                <td class="px-8 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">Verified Payer</td>
                                <td class="px-8 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-white font-bold text-sm">{{ $quote->payer_name }}</span>
                                        <span class="text-xs text-slate-400">{{ $quote->payer_email }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="p-4 bg-emerald-500/5 text-center">
                    <span class="text-[9px] font-black text-emerald-500/60 uppercase tracking-[0.3em]">Securely Processed via PayPal API v2</span>
                </div>
            </div>
            @endif
        </div>

        <!-- Action Sidebar (Col 1) -->
        <div class="space-y-8 lg:sticky lg:top-8">
            <div class="glass-card rounded-2xl p-8 border-white/5 shadow-[0_30px_60px_rgba(0,0,0,0.5)]">
                <h3 class="text-sm font-black text-slate-500 uppercase tracking-[0.2em] mb-6">Action Panel</h3>

                <form action="{{ route('admin.graphics.quotes.update', $quote->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 opacity-60">Final Pricing (USD)</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 font-bold group-focus-within:text-indigo-400 transition-colors">$</span>
                            <input type="number" step="0.01" name="amount" value="{{ old('amount', $quote->amount) }}" 
                                   class="w-full pl-10 pr-4 py-4 bg-slate-900/50 border border-white/10 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 text-white font-black text-xl transition-all" 
                                   placeholder="0.00" required>
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 opacity-60">Admin Internal Notes</label>
                        <textarea name="admin_notes" rows="4" 
                                  class="w-full px-4 py-3 bg-slate-900/50 border border-white/10 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 text-slate-200 text-sm transition-all"
                                  placeholder="Type notes for the client here...">{{ old('admin_notes', $quote->payment_details['admin_notes'] ?? '') }}</textarea>
                        <p class="text-[9px] text-slate-500 mt-2 font-medium tracking-wide">* These notes will be included in the email sent to the client.</p>
                    </div>

                    <div class="pt-6 space-y-3">
                        <button type="submit" class="w-full py-4 bg-white/5 hover:bg-white/10 text-white font-black uppercase tracking-widest text-[10px] rounded-xl border border-white/10 transition-all">
                            Save Changes Only
                        </button>
                        
                        <button type="submit" name="send_email" value="1" 
                                class="w-full py-4 bg-gradient-to-tr from-indigo-500 to-indigo-700 text-white font-black uppercase tracking-widest text-[10px] rounded-xl shadow-lg shadow-indigo-500/30 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                            <i class="ri-mail-send-fill text-sm"></i>
                            Save & Notify Client
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="glass-card rounded-2xl p-6 border-white/5 bg-rose-500/5 border-rose-500/10">
                <h4 class="text-[10px] font-black text-rose-400 uppercase tracking-widest mb-3">Danger Zone</h4>
                <p class="text-[11px] text-slate-500 mb-4 font-medium">Once deleted, this quote cannot be recovered. All associated files will remain but links will break.</p>
                
                <form action="{{ route('admin.graphics.quotes.destroy', $quote->id) }}" method="POST" onsubmit="return confirm('Delete permanently?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 bg-rose-500/10 hover:bg-rose-500 text-rose-500 hover:text-white font-bold rounded-lg text-xs transition-all border border-rose-500/20">
                        Delete Record
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
