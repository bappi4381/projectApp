@extends('layouts.admin')
@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center p-6 sm:p-12 relative overflow-hidden">
    
    {{-- Background Decorative elements --}}
    <div class="absolute top-1/4 -left-32 w-64 h-64 bg-indigo-500/10 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-1/4 -right-32 w-64 h-64 bg-cyan-400/10 blur-[120px] rounded-full"></div>

    <div class="w-full max-w-md relative z-10 reveal">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-tr from-indigo-500 to-indigo-600 shadow-lg shadow-indigo-500/20 mb-4 transition-transform hover:scale-110 duration-300">
                <i class="ri-fire-fill text-2xl text-white"></i>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight bg-gradient-to-b from-white to-slate-400 bg-clip-text text-transparent">PixelForge — Admin</h1>
            <p class="text-slate-500 font-medium mt-2">Authentication Secure Portal</p>
        </div>

        <div class="glass-card rounded-3xl p-8 sm:p-10 border-white/5 shadow-2xl relative">
            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2 ml-1" for="email">Email Address</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400">
                            <i class="ri-mail-line"></i>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="admin@pixelforge.com"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-900/50 border {{ $errors->has('email') ? 'border-rose-500/50' : 'border-white/5' }} rounded-2xl focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500/50 outline-none hover:bg-slate-900/80 transition-all text-slate-200 placeholder-slate-600">
                    </div>
                    @error('email')
                        <p class="text-[10px] text-rose-400 mt-2 ml-1 font-semibold uppercase tracking-wider">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 ml-1" for="password">Password</label>
                        <a href="#" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">Forgot Access Keys?</a>
                    </div>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400">
                            <i class="ri-lock-2-line"></i>
                        </span>
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-900/50 border border-white/5 rounded-2xl focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500/50 outline-none hover:bg-slate-900/80 transition-all text-slate-200 placeholder-slate-600">
                    </div>
                </div>

                <input type="hidden" id="recaptcha_token" name="recaptcha_token">

                <div class="pt-2">
                    <button type="submit" 
                        class="w-full py-4 px-6 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-indigo-500/25 transition-all hover:scale-[1.02] active:scale-95 focus:ring-4 focus:ring-indigo-500/50 flex items-center justify-center gap-2 group">
                        <span>Initialize Dashboard</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-8 border-t border-white/5 text-center">
                <p class="text-xs text-slate-600 font-medium leading-relaxed">
                    Protected by <span class="text-indigo-400/70">Google reCAPTCHA v3</span><br>
                    Encryption Standard AES-256 Enabled
                </p>
            </div>
        </div>
        
        <p class="text-center text-slate-700 text-[10px] mt-8 tracking-widest uppercase font-bold">
            &copy; {{ date('Y') }} PixelForge Group • Internal Tools V.2.0
        </p>
    </div>
</div>
@endsection
