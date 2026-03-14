@extends('layouts.app')
@section('title', 'Get a Quote | Graphics Studio')
@section('meta_description', 'Send us a quote request for exact pricing on photo editing and retouching. We usually reply in less than 30 minutes.')

@section('content')

<div class="bg-slate-950 min-h-screen text-white font-sans selection:bg-[#6366f1] selection:text-white">

    {{-- ── PAGE HERO ───────────────────────────────── --}}
    <div class="pt-32 md:pt-40 lg:pt-44 pb-16 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-gradient-to-b from-[#6366f1]/15 to-transparent rounded-full blur-[120px] pointer-events-none"></div>
        <div class="container mx-auto px-6 max-w-3xl text-center relative z-10">
            <span class="inline-block px-5 py-2 rounded-full bg-[#6366f1]/10 text-[#818cf8] text-[11px] font-bold tracking-[0.25em] uppercase border border-[#6366f1]/20 mb-6">
                Free Estimate
            </span>
            <h1 class="text-4xl md:text-6xl font-black tracking-tight text-white mb-4">
                Send Us a <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#6366f1] to-[#22d3ee]">Quote Request</span>
            </h1>
            <p class="text-slate-400 text-lg mb-3">for Exact Pricing</p>
            <div class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm font-semibold">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                We Usually Reply Less Than 30 Minutes
            </div>
        </div>
    </div>

    {{-- ── QUOTE FORM SECTION ──────────────────────── --}}
    <div class="container mx-auto px-6 max-w-3xl pb-8">

        @if(session('success'))
        <div class="mb-6 flex items-center gap-3 px-6 py-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 font-semibold">
            <i class="ri-checkbox-circle-fill text-2xl"></i>
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white/[0.04] border border-white/[0.08] rounded-3xl overflow-hidden backdrop-blur-sm">

            {{-- Info note --}}
            <div class="px-8 pt-7 pb-4">
                <p class="text-slate-400 text-sm text-center">Please Fill up the Required <span class="text-red-400 font-bold">( * )</span> Fields to Submit the Form Properly.</p>
            </div>

            <form action="{{ route('graphics.get-quote.post') }}" method="POST" enctype="multipart/form-data" class="px-8 pb-8 space-y-6">
                @csrf

                {{-- File Upload Zone --}}
                <div class="border-2 border-dashed border-white/20 rounded-2xl p-10 text-center hover:border-[#6366f1]/50 hover:bg-[#6366f1]/5 transition-all duration-300 cursor-pointer group"
                     x-data="{ dragging: false, files: [] }"
                     @dragover.prevent="dragging = true"
                     @dragleave.prevent="dragging = false"
                     @drop.prevent="dragging = false; files = [...$event.dataTransfer.files]"
                     :class="dragging ? 'border-[#6366f1] bg-[#6366f1]/10' : ''"
                     onclick="document.getElementById('file-input').click()">
                    <input type="file" id="file-input" name="files[]" multiple accept="image/*,.psd,.ai,.pdf,.zip"
                           class="hidden" @change="files = [...$event.target.files]">
                    <div class="w-16 h-16 rounded-2xl bg-[#6366f1]/10 border border-[#6366f1]/20 flex items-center justify-center mx-auto mb-4 group-hover:bg-[#6366f1]/20 transition-colors">
                        <i class="ri-cloud-upload-line text-3xl text-[#818cf8]"></i>
                    </div>
                    <p class="text-white font-bold mb-1">
                        <template x-if="files.length === 0">
                            <span>Upload Your Files <span class="text-slate-400 font-normal">(max 500mb/file, 10 files only)</span></span>
                        </template>
                        <template x-if="files.length > 0">
                            <span class="text-[#22d3ee]" x-text="files.length + ' file(s) selected'"></span>
                        </template>
                    </p>
                    <p class="text-slate-500 text-xs mt-1">or drag and drop here — JPG, PNG, PSD, AI, ZIP accepted</p>
                    <button type="button" class="mt-5 px-8 py-3 rounded-xl bg-[#6366f1] hover:bg-[#4f46e5] text-white text-sm font-bold transition-all inline-flex items-center gap-2">
                        <i class="ri-upload-2-line"></i> UPLOAD FILES
                    </button>
                </div>

                {{-- Two-column fields --}}
                <div class="grid sm:grid-cols-2 gap-5">
                    {{-- Full Name --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                            Full Name <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="name" required placeholder="John Doe"
                                   class="w-full bg-white/[0.05] border border-white/[0.1] rounded-xl px-5 py-3.5 pr-12 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-[#6366f1] focus:bg-white/[0.07] transition-all">
                            <i class="ri-user-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Phone</label>
                        <div class="relative">
                            <input type="tel" name="phone" placeholder="+1 555 000 0000"
                                   class="w-full bg-white/[0.05] border border-white/[0.1] rounded-xl px-5 py-3.5 pr-12 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-[#6366f1] focus:bg-white/[0.07] transition-all">
                            <i class="ri-phone-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                        </div>
                    </div>

                    {{-- Website --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Website</label>
                        <div class="relative">
                            <input type="url" name="website" placeholder="https://yoursite.com"
                                   class="w-full bg-white/[0.05] border border-white/[0.1] rounded-xl px-5 py-3.5 pr-12 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-[#6366f1] focus:bg-white/[0.07] transition-all">
                            <i class="ri-global-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                        </div>
                    </div>

                    {{-- Return File Type --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Return File Type</label>
                        <div class="relative">
                            <select name="return_type"
                                    class="w-full bg-white/[0.05] border border-white/[0.1] rounded-xl px-5 py-3.5 text-sm text-slate-300 focus:outline-none focus:border-[#6366f1] focus:bg-white/[0.07] transition-all appearance-none">
                                <option value="" class="bg-slate-900">Select Return Type</option>
                                <option value="jpg" class="bg-slate-900">JPG / JPEG</option>
                                <option value="png" class="bg-slate-900">PNG (Transparent)</option>
                                <option value="psd" class="bg-slate-900">PSD (Layered)</option>
                                <option value="tiff" class="bg-slate-900">TIFF</option>
                                <option value="same" class="bg-slate-900">Same as Original</option>
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 pointer-events-none"></i>
                        </div>
                    </div>

                    {{-- Services --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Services</label>
                        <div class="relative">
                            <select name="service"
                                    class="w-full bg-white/[0.05] border border-white/[0.1] rounded-xl px-5 py-3.5 text-sm text-slate-300 focus:outline-none focus:border-[#6366f1] focus:bg-white/[0.07] transition-all appearance-none">
                                <option value="" class="bg-slate-900">Select Services</option>
                                <option value="clipping_path" class="bg-slate-900">Clipping Path</option>
                                <option value="background_removal" class="bg-slate-900">Background Removal</option>
                                <option value="image_masking" class="bg-slate-900">Image Masking</option>
                                <option value="photo_retouching" class="bg-slate-900">Photo Retouching</option>
                                <option value="ghost_mannequin" class="bg-slate-900">Ghost Mannequin Effect</option>
                                <option value="shadow_services" class="bg-slate-900">Shadow Services</option>
                                <option value="color_correction" class="bg-slate-900">Color Correction</option>
                                <option value="real_estate" class="bg-slate-900">Real Estate Editing</option>
                                <option value="jewellery" class="bg-slate-900">Jewellery Photo Editing</option>
                                <option value="video_editing" class="bg-slate-900">Video Editing</option>
                                <option value="other" class="bg-slate-900">Other</option>
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 pointer-events-none"></i>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                            Email <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input type="email" name="email" required placeholder="you@example.com"
                                   class="w-full bg-white/[0.05] border border-white/[0.1] rounded-xl px-5 py-3.5 pr-12 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-[#6366f1] focus:bg-white/[0.07] transition-all">
                            <i class="ri-mail-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                        </div>
                    </div>
                </div>

                {{-- Instructions --}}
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">
                        Your Instructions <span class="text-red-400">*</span>
                    </label>
                    <textarea name="instructions" required rows="5" placeholder="Describe your requirements in detail — background color, output format, specific retouching needs, deadline, etc."
                              class="w-full bg-white/[0.05] border border-white/[0.1] rounded-xl px-5 py-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-[#6366f1] focus:bg-white/[0.07] transition-all resize-none"></textarea>
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full py-4 rounded-2xl bg-[#6366f1] hover:bg-[#4f46e5] active:scale-[0.98] text-white font-black text-sm uppercase tracking-widest transition-all shadow-lg shadow-[#6366f1]/30 hover:-translate-y-0.5 flex items-center justify-center gap-3">
                    <i class="ri-send-plane-fill text-lg"></i> Submit Quote Request
                </button>

                {{-- Terms --}}
                <p class="text-center text-xs text-slate-500 leading-relaxed">
                    By submitting Quote you are automatically agreeing with our
                    <a href="#" class="text-[#818cf8] hover:text-white transition-colors underline underline-offset-2">Terms and Conditions</a>
                    and
                    <a href="#" class="text-[#818cf8] hover:text-white transition-colors underline underline-offset-2">Privacy Policy</a>
                </p>
            </form>
        </div>

        {{-- Contact Info Pills --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
            @foreach([
                ['ri-phone-line','Toll Free','1 757 540-5884'],
                ['ri-whatsapp-line','WhatsApp','+971 50 2036 939'],
                ['ri-mail-send-line','Email','info@pixelforge.com'],
            ] as [$icon,$lbl,$val])
            <div class="flex items-center gap-4 p-5 rounded-2xl bg-white/[0.04] border border-white/[0.07] hover:border-[#6366f1]/30 transition-all">
                <div class="w-10 h-10 rounded-xl bg-[#6366f1]/10 flex items-center justify-center shrink-0">
                    <i class="{{ $icon }} text-[#818cf8] text-xl"></i>
                </div>
                <div>
                    <div class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">{{ $lbl }}</div>
                    <div class="text-sm font-bold text-white">{{ $val }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── USEFUL INSTRUCTIONS (FAQ) ────────────────── --}}
    <div class="container mx-auto px-6 max-w-3xl py-10 pb-28">
        <h3 class="text-xl font-black text-white mb-6 flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-[#6366f1]/10 border border-[#6366f1]/20 flex items-center justify-center">
                <i class="ri-information-line text-[#818cf8]"></i>
            </span>
            Useful Instructions
        </h3>

        <div class="space-y-3" x-data="{ open: 0 }">
            @php
            $instructions = [
                ['q' => 'How many files can be uploaded?',     'a' => 'You can upload your files (max 500mb/file, up to 10 files). For larger batches, use a file sharing service like WeTransfer or Dropbox and paste the link in the instructions box.'],
                ['q' => 'How to upload bulks at a time?',       'a' => 'To upload bulk images, compress them into a single ZIP archive and upload that single file. This is the easiest way to send hundreds of images at once without hitting the file limit.'],
                ['q' => 'What are the file formats you allow?', 'a' => 'We accept JPG, JPEG, PNG, PSD, AI, PDF, TIFF, and ZIP archives. If your files are in another format, please mention it in the instructions and we will advise you accordingly.'],
                ['q' => 'How soon will I get a quote back?',    'a' => 'Our team is available around the clock. In most cases you will receive a personalized price quote within 30 minutes of form submission, even during weekends.'],
                ['q' => 'Can I request a sample before paying?','a' => 'Yes! We offer a free trial of 3 images for new clients. Simply mention "Free Trial" in the instructions field when submitting your quote request.'],
            ];
            @endphp

            @foreach($instructions as $fi => $item)
            <div class="rounded-2xl border border-white/[0.07] bg-white/[0.03] overflow-hidden">
                <button class="w-full flex items-center gap-4 px-6 py-4 text-left"
                        @click="open = open === {{ $fi }} ? -1 : {{ $fi }}">
                    <span class="w-7 h-7 rounded-lg shrink-0 flex items-center justify-center text-xs font-black"
                          :class="open === {{ $fi }} ? 'bg-[#6366f1] text-white' : 'bg-white/10 text-slate-400'">
                        {{ $fi + 1 }}
                    </span>
                    <span class="flex-1 text-sm font-bold text-white text-left">{{ $item['q'] }}</span>
                    <i class="ri-arrow-down-s-line text-lg text-slate-400 transition-transform shrink-0"
                       :class="open === {{ $fi }} ? 'rotate-180 text-[#6366f1]' : ''"></i>
                </button>
                <div x-show="open === {{ $fi }}"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-6 pb-5 text-slate-400 text-sm leading-relaxed border-t border-white/[0.05] pt-4"
                     x-cloak>
                    {{ $item['a'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
