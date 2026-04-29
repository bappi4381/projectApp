@extends('layouts.app')
@section('title', 'Get a Quote | Graphics Studio')

@section('content')

{{-- Force light theme wrapper --}}
<div class="bg-white min-h-screen text-[#333] font-sans pt-40 lg:pt-56" style="padding-top: 180px;">

    {{-- ── PAGE HEADER ─────────────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-4xl text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold italic mb-3 text-[#333]">
            Send Us a Quote Request for Exact Pricing
        </h1>
        <p class="text-lg italic font-bold mb-6 text-[#555]">
            We Usually Reply Less Than 30 Minutes
        </p>
        <p class="text-sm text-slate-500">
            Please Fill up the Required <span class="text-red-500 font-bold">( * )</span> Fields to Submit the Form Properly.
        </p>
    </div>

    {{-- ── QUOTE FORM SECTION ─────────────────────────────── --}}
    {{-- ── SUCCESS MESSAGE OVERLAY ───────────────────────── --}}
    @if(session('quote_success'))
    <div class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm" x-data="{ show: true }" x-show="show">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 text-center relative overflow-hidden" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">
            
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-400 to-blue-600"></div>
            
            <div class="mb-6 inline-flex items-center justify-center w-20 h-20 bg-green-50 rounded-full text-green-500 shadow-inner">
                <i class="ri-checkbox-circle-fill text-5xl"></i>
            </div>
            
            <h2 class="text-2xl font-black text-slate-800 mb-2 uppercase tracking-tight">Request Received!</h2>
            <p class="text-slate-500 mb-6 text-sm leading-relaxed">
                Thank you! Your quote request has been successfully submitted. Our team will review your requirements and get back to you within 30 minutes.
            </p>
            
            <div class="bg-slate-50 rounded-xl p-5 mb-8 border border-slate-100">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Invoice ID</span>
                    <span class="text-sm font-bold text-blue-600">#{{ session('quote_success')['invoice_id'] }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Confirmation Sent To</span>
                    <span class="text-sm font-bold text-slate-700">{{ session('quote_success')['email'] }}</span>
                </div>
            </div>
            
            <div class="flex flex-col gap-3">
                <button @click="show = false" class="w-full py-4 bg-slate-800 hover:bg-slate-900 text-white font-black uppercase tracking-widest text-[11px] rounded-xl transition-all shadow-lg">
                    Got it, Thanks
                </button>
                <p class="text-[10px] text-slate-400 italic">
                    You can close this window to submit another request.
                </p>
            </div>
        </div>
    </div>
    @endif

    <div class="container mx-auto px-6 max-w-4xl pb-20">

        <form action="{{ route('graphics.get-quote.post') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- File Upload Zone --}}
            <div class="border-2 border-dashed border-[#999] rounded-lg p-10 text-center bg-slate-50 relative group transition-all duration-300"
                 x-data="{ dragging: false, files: [] }"
                 @dragover.prevent="dragging = true"
                 @dragleave.prevent="dragging = false"
                 @drop.prevent="dragging = false; files = [...$event.dataTransfer.files]"
                 :class="dragging ? 'border-blue-500 bg-blue-50' : ''">
                
                <input type="file" id="file-input" name="files[]" multiple accept="image/*,.psd,.ai,.pdf,.zip"
                        class="hidden" @change="files = [...$event.target.files]"
                        onclick="document.getElementById('file-input').click()">
                
                <div class="mb-4">
                    <p class="text-sm font-bold text-[#555]">
                        Upload Your Files <span class="text-slate-500 font-normal">(max 500mb/file, 10 files only)</span>
                    </p>
                </div>
                
                <button type="button" 
                        onclick="document.getElementById('file-input').click()"
                        class="px-8 py-3 rounded bg-[#5188b8] hover:bg-[#4577a3] text-white text-sm font-bold transition-all inline-flex items-center gap-2 shadow-sm uppercase">
                    <i class="ri-upload-cloud-2-fill text-xl opacity-50"></i> UPLOAD FILES
                </button>

                <div x-show="files.length > 0" class="mt-4 text-blue-600 font-bold text-sm" x-cloak>
                    <span x-text="files.length + ' file(s) selected'"></span>
                </div>
            </div>

            {{-- Form Fields --}}
            <div class="grid md:grid-cols-2 gap-x-8 gap-y-6 pt-4">
                {{-- Full Name --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-[#444]">
                        Full Name:<span class="text-red-500 font-bold">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="name" required
                               class="w-full border border-[#ddd] rounded px-4 py-2 text-sm text-[#333] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 transition-all">
                        <i class="ri-user-fill absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                </div>

                {{-- Phone --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-[#444]">Phone:</label>
                    <div class="relative">
                        <input type="tel" name="phone"
                               class="w-full border border-[#ddd] rounded px-4 py-2 text-sm text-[#333] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 transition-all">
                        <i class="ri-phone-fill absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                </div>

                {{-- Website --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-[#444]">Website:</label>
                    <div class="relative">
                        <input type="url" name="website"
                               class="w-full border border-[#ddd] rounded px-4 py-2 text-sm text-[#333] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 transition-all">
                        <i class="ri-global-fill absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                </div>

                {{-- Return File Type --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-[#444]">Return file Type:</label>
                    <div class="relative">
                        <input type="text" name="return_type"
                                class="w-full border border-[#ddd] rounded px-4 py-2 text-sm text-[#333] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 transition-all">
                    </div>
                </div>

                {{-- Services --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-[#444]">Services:<span class="text-red-500 font-bold">*</span></label>
                    <div class="relative">
                        <select name="services[]" required
                                class="w-full border border-[#ddd] rounded px-4 py-2 text-sm text-[#666] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 appearance-none bg-white">
                            <option value="">Select Services</option>
                            @foreach($services as $svc)
                                <option value="{{ $svc->name }}">{{ $svc->name }}</option>
                            @endforeach
                        </select>
                        <i class="ri-arrow-down-s-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                    </div>
                </div>

                {{-- Email --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-[#444]">
                        Email:<span class="text-red-500 font-bold">*</span>
                    </label>
                    <div class="relative">
                        <input type="email" name="email" required
                               class="w-full border border-[#ddd] rounded px-4 py-2 text-sm text-[#333] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 transition-all">
                        <i class="ri-mail-fill absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                </div>
            </div>

            {{-- Instructions --}}
            <div class="space-y-1 pt-4">
                <label class="block text-sm font-bold text-[#444]">
                    Your Instructions :<span class="text-red-500 font-bold">*</span>
                </label>
                <textarea name="instructions" required rows="5"
                          class="w-full border border-[#ddd] rounded px-4 py-4 text-sm text-[#333] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 transition-all resize-none"></textarea>
            </div>

            {{-- Submit --}}
            <button type="submit" class="w-full py-2.5 rounded bg-[#5188b8] hover:bg-[#4577a3] text-white font-bold text-lg shadow transition-all">
                Submit
            </button>

            {{-- Terms --}}
            <div class="pt-8 text-center text-sm text-[#444]">
                By submitting Quote you are automatically agreeing with our 
                <a href="#" class="text-blue-500 hover:underline">Terms and Conditions</a> and 
                <a href="#" class="text-blue-500 hover:underline">Privacy Policy</a>
            </div>
        </form>

        {{-- ── USEFUL INSTRUCTIONS (FAQ) ────────────────── --}}
        <div class="mt-20">
            <h3 class="text-xl font-bold text-[#333] mb-6">Useful instructions:</h3>

            <div class="border border-[#eee] rounded-sm overflow-hidden" x-data="{ open: 0 }">
                @php
                $instructions = [
                    ['q' => 'How many files can be uploaded?',     'a' => 'You can upload your files (max 500mb/file, up to 10 files). For larger batches, use a file sharing service like WeTransfer or Dropbox.'],
                    ['q' => 'How to upload bulks at a time?',       'a' => 'To upload bulk images, compress them into a single ZIP archive and upload that single file.'],
                    ['q' => 'What are the file formats you allow?', 'a' => 'We accept JPG, JPEG, PNG, PSD, AI, PDF, TIFF, and ZIP archives.'],
                ];
                @endphp

                @foreach($instructions as $fi => $item)
                <div class="border-b last:border-b-0 border-[#eee]">
                    <button class="w-full flex items-center text-left"
                            @click="open = open === {{ $fi }} ? -1 : {{ $fi }}">
                        <div class="w-12 h-14 bg-slate-50 flex items-center justify-center shrink-0 border-r border-[#eee]">
                            <span class="text-lg font-bold text-[#333]">{{ $fi + 1 }}</span>
                        </div>
                        <div class="flex-1 px-6 text-sm font-normal text-[#555]">
                            {{ $item['q'] }}
                        </div>
                        <div class="px-6 text-slate-300">
                             <i :class="open === {{ $fi }} ? 'ri-subtract-line' : 'ri-add-line'" class="text-lg"></i>
                        </div>
                    </button>
                    <div x-show="open === {{ $fi }}" class="px-12 py-6 bg-white text-sm text-slate-500 border-t border-[#eee]" x-cloak>
                        {{ $item['a'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

<style>
    /* Force body background because of layout */
    body { background: white !important; color: #333 !important; }
    /* Force the navbar to have its 'scrolled' styling from the start so white text doesn't disappear on white background if you want */
    #main-navbar { background: #444 !important; }
    #main-navbar .studio-nav-link { color: white !important; }
    #main-navbar .logo-text-primary { color: white !important; }
</style>

@endsection
