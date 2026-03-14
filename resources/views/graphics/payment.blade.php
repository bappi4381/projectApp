@extends('layouts.app')
@section('title', 'Payment Methods | Graphics Studio')
@section('meta_description', 'Secure and flexible payment options for all photo editing services at PixelForge Graphics Studio — PayPal, Payoneer, Bank Transfer, and more.')

@section('content')

<div class="bg-slate-950 min-h-screen text-white font-sans selection:bg-[#6366f1] selection:text-white">

    {{-- ── PAGE HERO ─────────────────────────────────── --}}
    <div class="pt-32 md:pt-40 lg:pt-44 pb-16 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-gradient-to-b from-emerald-500/10 to-transparent rounded-full blur-[120px] pointer-events-none"></div>
        <div class="container mx-auto px-6 max-w-5xl text-center relative z-10">
            <span class="inline-block px-5 py-2 rounded-full bg-emerald-500/10 text-emerald-400 text-[11px] font-bold tracking-[0.25em] uppercase border border-emerald-500/20 mb-6">
                Secure Payments
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tight text-white mb-6">
                Payment <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-[#22d3ee]">Methods</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                We offer flexible, secure payment options worldwide. Choose the method that works best for you — no surprises, no hidden fees.
            </p>

            {{-- Trust badges --}}
            <div class="flex flex-wrap justify-center gap-5 mt-10">
                @foreach(['100% Secure','256-bit SSL','Money-back Guarantee','No Hidden Fees'] as $badge)
                <div class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/[0.04] border border-white/[0.07] text-sm text-slate-300 font-semibold">
                    <i class="ri-shield-check-fill text-emerald-400"></i> {{ $badge }}
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── PAYMENT METHOD CARDS ──────────────────────── --}}
    <div class="container mx-auto px-6 max-w-6xl pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @php
            $methods = [
                [
                    'icon'    => 'ri-paypal-fill',
                    'icon_color' => 'text-[#003087]',
                    'icon_bg' => 'bg-[#009cde]/10',
                    'name'    => 'PayPal',
                    'tag'     => 'Most Popular',
                    'tag_color' => 'bg-[#009cde]/10 text-[#009cde] border-[#009cde]/20',
                    'desc'    => 'The fastest and most widely used method. Send payment directly to our verified PayPal account. Instant confirmation.',
                    'detail'  => 'paypal@pixelforge.com',
                    'detail_icon' => 'ri-mail-line',
                    'steps'   => ['Log into your PayPal account', 'Click "Send & Request"', 'Enter our PayPal email', 'Add your Order ID in the note'],
                    'color'   => 'from-[#003087]/20 to-transparent',
                    'border'  => 'border-[#009cde]/20',
                ],
                [
                    'icon'    => 'ri-bank-card-fill',
                    'icon_color' => 'text-[#ff6600]',
                    'icon_bg' => 'bg-[#ff6600]/10',
                    'name'    => 'Payoneer',
                    'tag'     => 'Recommended',
                    'tag_color' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                    'desc'    => 'Send us a payment request via Payoneer. Ideal for freelancers and agencies. Supports 200+ countries.',
                    'detail'  => 'payment@pixelforge.com',
                    'detail_icon' => 'ri-mail-line',
                    'steps'   => ['Open Payoneer and click "Pay"', 'Enter our Payoneer email', 'Set currency to USD', 'Add Order ID in reference'],
                    'color'   => 'from-[#ff6600]/10 to-transparent',
                    'border'  => 'border-[#ff6600]/20',
                ],
                [
                    'icon'    => 'ri-exchange-dollar-fill',
                    'icon_color' => 'text-emerald-400',
                    'icon_bg' => 'bg-emerald-500/10',
                    'name'    => 'Wire Transfer',
                    'tag'     => 'For Large Orders',
                    'tag_color' => 'bg-slate-600/30 text-slate-300 border-slate-600/30',
                    'desc'    => 'Bank wire transfer available for large volume orders. Contact us first for our banking details.',
                    'detail'  => '+1 757 540-5884',
                    'detail_icon' => 'ri-phone-line',
                    'steps'   => ['Contact us for bank details', 'Initiate transfer from your bank', 'Email us the transfer receipt', 'Processing begins after clearance'],
                    'color'   => 'from-emerald-500/10 to-transparent',
                    'border'  => 'border-emerald-500/20',
                ],
                [
                    'icon'    => 'ri-visa-fill',
                    'icon_color' => 'text-[#1a1f71]',
                    'icon_bg' => 'bg-[#6366f1]/10',
                    'name'    => 'Credit / Debit Card',
                    'tag'     => 'Visa & Mastercard',
                    'tag_color' => 'bg-[#6366f1]/10 text-[#818cf8] border-[#6366f1]/20',
                    'desc'    => 'Pay via credit or debit card through our secure invoice link. Visa, Mastercard, and American Express accepted.',
                    'detail'  => 'Sent via email invoice',
                    'detail_icon' => 'ri-secure-payment-line',
                    'steps'   => ['Request a quote first', 'We send you a secure invoice link', 'Click link and enter card details', 'Automatic confirmation sent'],
                    'color'   => 'from-[#6366f1]/10 to-transparent',
                    'border'  => 'border-[#6366f1]/20',
                ],
                [
                    'icon'    => 'ri-skype-fill',
                    'icon_color' => 'text-[#00aff0]',
                    'icon_bg' => 'bg-[#00aff0]/10',
                    'name'    => 'Skype',
                    'tag'     => 'Chat & Pay',
                    'tag_color' => 'bg-[#00aff0]/10 text-[#00aff0] border-[#00aff0]/20',
                    'desc'    => 'Reach us on Skype and we can discuss your project in real time, then proceed to payment via your preferred method.',
                    'detail'  => 'live:pixelforge.studio',
                    'detail_icon' => 'ri-skype-line',
                    'steps'   => ['Search our Skype ID', 'Describe your project needs', 'Agree on price and timeline', 'Proceed with your preferred payment'],
                    'color'   => 'from-[#00aff0]/10 to-transparent',
                    'border'  => 'border-[#00aff0]/20',
                ],
                [
                    'icon'    => 'ri-whatsapp-fill',
                    'icon_color' => 'text-[#25d366]',
                    'icon_bg' => 'bg-[#25d366]/10',
                    'name'    => 'WhatsApp',
                    'tag'     => 'Quick Contact',
                    'tag_color' => 'bg-[#25d366]/10 text-[#25d366] border-[#25d366]/20',
                    'desc'    => 'Message us directly on WhatsApp to discuss your project. We\'ll guide you to the quickest payment option for your region.',
                    'detail'  => '+971 50 2036 939',
                    'detail_icon' => 'ri-smartphone-line',
                    'steps'   => ['Add our WhatsApp number', 'Send project details & sample image', 'Receive price quote', 'Pay via PayPal or Payoneer'],
                    'color'   => 'from-[#25d366]/10 to-transparent',
                    'border'  => 'border-[#25d366]/20',
                ],
            ];
            @endphp

            @foreach($methods as $i => $m)
            <div class="group flex flex-col rounded-2xl border {{ $m['border'] }} bg-white/[0.03] hover:bg-white/[0.06] transition-all duration-500 overflow-hidden reveal" style="animation-delay: {{ $i * 0.07 }}s">
                {{-- Card gradient top --}}
                <div class="h-1.5 w-full bg-gradient-to-r {{ $m['color'] }}"></div>

                <div class="p-7 flex-1 flex flex-col">
                    {{-- Header --}}
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl {{ $m['icon_bg'] }} flex items-center justify-center text-3xl">
                            <i class="{{ $m['icon'] }} {{ $m['icon_color'] }}"></i>
                        </div>
                        <span class="px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest border {{ $m['tag_color'] }}">
                            {{ $m['tag'] }}
                        </span>
                    </div>

                    <h3 class="text-xl font-black text-white mb-2 group-hover:text-[#22d3ee] transition-colors">{{ $m['name'] }}</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">{{ $m['desc'] }}</p>

                    {{-- Steps --}}
                    <div class="space-y-2.5 mb-6 flex-1">
                        @foreach($m['steps'] as $si => $step)
                        <div class="flex items-start gap-3 text-sm">
                            <span class="w-5 h-5 rounded-full bg-white/10 text-slate-400 text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">{{ $si + 1 }}</span>
                            <span class="text-slate-300">{{ $step }}</span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Contact detail --}}
                    <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/[0.04] border border-white/[0.07]">
                        <i class="{{ $m['detail_icon'] }} text-[#22d3ee] shrink-0"></i>
                        <span class="text-white text-sm font-bold truncate">{{ $m['detail'] }}</span>
                        <button onclick="navigator.clipboard.writeText('{{ $m['detail'] }}')"
                                class="ml-auto text-slate-500 hover:text-[#22d3ee] transition-colors shrink-0"
                                title="Copy">
                            <i class="ri-file-copy-line text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    {{-- ── HOW IT WORKS ──────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-5xl py-14">
        <div class="text-center mb-12 reveal">
            <span class="inline-block px-5 py-2 rounded-full bg-[#6366f1]/10 text-[#818cf8] text-[11px] font-bold tracking-[0.25em] uppercase border border-[#6366f1]/20 mb-4">Process</span>
            <h2 class="text-3xl md:text-4xl font-black text-white">How Payment Works</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @php
            $steps = [
                ['num'=>'01','icon'=>'ri-file-upload-line','title'=>'Submit Order','desc'=>'Upload your images and fill in the Get Quote form with all requirements.'],
                ['num'=>'02','icon'=>'ri-price-tag-3-line','title'=>'Receive Quote','desc'=>'We reply within 30 minutes with an exact price and turnaround time.'],
                ['num'=>'03','icon'=>'ri-secure-payment-line','title'=>'Make Payment','desc'=>'Pay via your preferred method from the options above. Secure & fast.'],
                ['num'=>'04','icon'=>'ri-image-edit-line','title'=>'Get Your Files','desc'=>'We start editing immediately and deliver to your chosen format on time.'],
            ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="relative text-center p-6 rounded-2xl border border-white/[0.07] bg-white/[0.02] reveal" style="animation-delay: {{ $i * 0.1 }}s">
                {{-- connector line --}}
                @if(!$loop->last)
                <div class="hidden md:block absolute top-[52px] left-[calc(100%+1px)] w-6 h-[2px] bg-white/10 z-10"></div>
                @endif
                <div class="w-12 h-12 rounded-2xl bg-[#6366f1]/10 border border-[#6366f1]/20 flex items-center justify-center text-xl text-[#818cf8] mx-auto mb-4">
                    <i class="{{ $step['icon'] }}"></i>
                </div>
                <span class="text-[10px] font-black text-slate-600 tracking-widest uppercase block mb-2">Step {{ $step['num'] }}</span>
                <h4 class="text-base font-black text-white mb-2">{{ $step['title'] }}</h4>
                <p class="text-slate-400 text-xs leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── FAQ ─────────────────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-3xl pb-28">
        <div class="text-center mb-8 reveal">
            <h2 class="text-2xl md:text-3xl font-black text-white">Payment FAQs</h2>
        </div>
        <div class="space-y-3" x-data="{ open: 0 }">
            @php
            $faqs = [
                ['q'=>'Is it safe to pay online?', 'a'=>'Yes, all payments are processed through established, encrypted platforms (PayPal, Payoneer). We never store card or banking details on our servers.'],
                ['q'=>'Do you start work before payment?', 'a'=>'For new clients, payment is required before we begin. For trusted repeat clients, we can arrange net-7 or net-15 invoicing terms.'],
                ['q'=>'Can I get a refund?', 'a'=>'If we are unable to deliver the work to your satisfaction after revisions, we offer a full refund. We are committed to your complete satisfaction.'],
                ['q'=>'What currencies do you accept?', 'a'=>'We accept USD primarily. If you need to pay in another currency, please contact us and we will accommodate where possible via PayPal or Payoneer.'],
                ['q'=>'How do I get an invoice?', 'a'=>'A professional invoice is sent to your email with every completed order. Just let us know if you need it in a specific format for your accounting team.'],
            ];
            @endphp
            @foreach($faqs as $fi => $faq)
            <div class="rounded-2xl border border-white/[0.07] bg-white/[0.03] overflow-hidden reveal" style="animation-delay: {{ $fi * 0.05 }}s">
                <button class="w-full flex items-center gap-4 px-6 py-4 text-left" @click="open = open === {{ $fi }} ? -1 : {{ $fi }}">
                    <span class="w-7 h-7 rounded-lg shrink-0 flex items-center justify-center text-xs font-black transition-colors"
                          :class="open === {{ $fi }} ? 'bg-emerald-500 text-white' : 'bg-white/10 text-slate-400'">
                        {{ $fi + 1 }}
                    </span>
                    <span class="flex-1 text-sm font-bold text-white text-left">{{ $faq['q'] }}</span>
                    <i class="ri-arrow-down-s-line text-lg text-slate-400 transition-transform shrink-0"
                       :class="open === {{ $fi }} ? 'rotate-180 text-emerald-400' : ''"></i>
                </button>
                <div x-show="open === {{ $fi }}"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-6 pt-4 pb-5 text-slate-400 text-sm leading-relaxed border-t border-white/[0.05]"
                     x-cloak>{{ $faq['a'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
