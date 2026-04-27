@extends('layouts.app')
@section('title', 'Payment | Graphics Studio')

@section('content')

{{-- Force light theme wrapper --}}
<div class="bg-white min-h-screen text-[#333] font-sans pt-40 lg:pt-56" style="padding-top: 180px;">
    {{-- ── PAYMENT CONTENT ────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-[850px] mt-10 mb-24 text-center">
        <h2 class="text-2xl font-black text-[#333] mb-8 uppercase tracking-wide">PAYMENT</h2>

        {{-- Payment Accordions Wrapper --}}
        <div class="max-w-[600px] mx-auto space-y-3 mb-12 text-left" x-data="paymentApp()">
            
            {{-- Success Message --}}
            <div x-show="paymentSuccess" x-cloak
                 class="bg-green-50 border border-green-200 text-green-800 p-6 rounded-lg mb-6 text-center">
                <i class="ri-checkbox-circle-fill text-4xl text-green-500 mb-2 block"></i>
                <h3 class="text-lg font-bold mb-1">Payment Successful!</h3>
                <p class="text-sm" x-text="'Transaction ID: ' + transactionId"></p>
                <p class="text-sm text-green-600 mt-2">A confirmation email has been sent.</p>
            </div>

            {{-- Error Message --}}
            <div x-show="paymentError" x-cloak
                 class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-lg mb-6">
                <p class="text-sm font-bold" x-text="paymentError"></p>
            </div>

            {{-- Primary Payment Method Accordion --}}
            <div class="bg-[#efefef] border border-[#111]" x-show="!paymentSuccess">
                <button @click="tab = tab === 'primary' ? '' : 'primary'" class="w-full relative flex items-center justify-center px-6 py-5 font-bold text-[#00609c] text-[14px] tracking-wide uppercase transition-colors hover:text-[#004e82]">
                    <span>PRIMARY PAYMENT METHOD</span>
                    <span class="absolute right-6 text-xl font-normal leading-none text-[#999]" x-text="tab === 'primary' ? '-' : '+'"></span>
                </button>
                
                <div x-show="tab === 'primary'" class="px-6 pb-6 pt-1" x-collapse>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-bold text-[#333] uppercase mb-1">Pay To</label>
                            <input type="text" value="Color Experts International, Inc" readonly class="w-full border border-[#ddd] bg-transparent px-3 py-[10px] text-[13px] text-[#777] focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-[#333] uppercase mb-1">Total Amount(USD):</label>
                            <input type="number" step="0.01" x-model="amount" placeholder="0.00" class="w-full border border-[#ddd] bg-white px-3 py-[10px] text-[13px] text-[#333] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 placeholder-[#999]">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-[#333] mb-1">Invoice/Job ID:</label>
                            <input type="text" x-model="invoiceId" placeholder="Invoice/Job ID" class="w-full border border-[#ddd] bg-white px-3 py-[10px] text-[13px] text-[#333] focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 placeholder-[#999]">
                        </div>
                        
                        {{-- PayPal Button Container --}}
                        <div class="pt-2">
                            <div id="paypal-button-container" 
                                 x-show="amount > 0"
                                 x-transition></div>
                            
                            <p x-show="!amount || amount <= 0" class="text-center text-sm text-[#999] py-4">
                                Please enter an amount to proceed with payment.
                            </p>
                        </div>

                        {{-- Processing Indicator --}}
                        <div x-show="processing" x-cloak class="text-center py-4">
                            <div class="inline-flex items-center gap-2 text-[#007cd5]">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                <span class="text-sm font-bold">Processing payment...</span>
                            </div>
                        </div>

                        <div class="text-center pt-[2px]">
                            <span class="text-[9px] text-[#666] italic block">Powered by <span class="font-bold text-[#007cd5]">PayPal</span></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Alternative Payment Method Accordion --}}
            <div class="bg-[#efefef] border border-[#111]" x-show="!paymentSuccess">
                <button @click="tab = tab === 'alt' ? '' : 'alt'" class="w-full relative flex items-center justify-center px-6 py-5 font-bold text-[#00609c] text-[14px] tracking-wide transition-colors hover:text-[#004e82]">
                    <span>ALTERNATIVE PAYMENT WAY</span>
                    <span class="absolute right-6 text-xl font-normal leading-none text-[#999]" x-text="tab === 'alt' ? '-' : '+'"></span>
                </button>
                
                <div x-show="tab === 'alt'" class="px-6 pb-8 pt-1" x-collapse x-cloak>
                    {{-- PayPal Card Badge --}}
                    <div class="w-[240px] mx-auto border border-[#002b5e] bg-white">
                        <div class="bg-[#002b5e] text-center py-1">
                            <span class="text-white font-bold italic tracking-tighter text-[22px]">PayPal</span>
                        </div>
                        <div class="flex justify-center items-center gap-[6px] p-2 bg-white">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/MasterCard_Logo.svg" alt="MasterCard" class="h-[24px]">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="h-[16px]">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg" alt="AMEX" class="h-[24px] bg-white rounded-sm p-[1px]">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/57/Discover_Card_logo.svg" alt="Discover" class="h-[18px]">
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-[12px] text-[#666]">
                            Send payment directly to: <strong class="text-[#333]">payments@colorexpertsint.com</strong>
                        </p>
                        <p class="text-[11px] text-[#999] mt-2">Please include your Invoice/Job ID in the payment note.</p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Info Text --}}
        <div class="text-[#555] text-[15px] leading-[1.8] mb-6 font-normal text-left md:text-justify max-w-[800px] mx-auto">
            <strong class="text-[#333]">Color Experts International, Inc.</strong> provides unique option for clients to pay for the services. Clients <strong class="text-[#333]">don't require to have credit cards</strong> or set up accounts to make their payments. All you have to do is simply fill out a form providing the contact <strong class="text-[#333]">name</strong>, company information with full address, and contact number. After a batch of work is done, an invoice is sent to the clients. However, clients will have the option to pay through <strong class="text-[#333]">Paypal</strong> using a <strong class="text-[#333]">credit/debit card</strong> or <strong class="text-[#333]">bank account</strong> or in the case of US-based clients, a check may be sent to the following address:
        </div>

        <div class="text-[15px] font-bold text-[#333] mb-12 text-center">
            Color Experts International, Inc. 358 Foxridge Dr SW. Leesburg, Virginia 20175, USA. Tel: (703) 436-9404 (USA)
        </div>

        {{-- Alert Box --}}
        <div class="bg-[#3692cf] text-white p-[14px] rounded-[3px] flex items-center gap-3 text-left shadow-sm">
            <div class="w-6 h-6 border border-white/60 text-white rounded-full flex items-center justify-center text-xs shrink-0 font-bold opacity-80 mt-0.5">?</div>
            <span class="font-bold text-[14px] tracking-wide">If you face any hassle in payment processing, please clear your browser cache!</span>
        </div>

    </div>
</div>

<style>
    /* Prevent flashing of unstyled content */
    [x-cloak] { display: none !important; }
    
    /* Global Overrides for this specific page */
    body { background: white !important; color: #333 !important; }
    
    /* Standardize navbar for this light page since it lacks a hero image */
    #main-navbar { background: #333 !important; }
    #main-navbar .studio-nav-link { color: white !important; }
    #main-navbar .logo-text-primary { color: white !important; }
</style>

{{-- PayPal JS SDK --}}
@php
    $paypalClientId = config('services.paypal.client_id');
    $paypalMode = config('services.paypal.mode', 'sandbox');
@endphp

@if($paypalClientId)
<script src="https://www.paypal.com/sdk/js?client-id={{ $paypalClientId }}&currency=USD&intent=capture" data-sdk-integration-source="button-factory"></script>
@endif

<script>
function paymentApp() {
    return {
        tab: 'primary',
        amount: '',
        invoiceId: '',
        processing: false,
        paymentSuccess: false,
        paymentError: '',
        transactionId: '',
        paypalRendered: false,

        init() {
            // Watch for amount changes to render/re-render PayPal buttons
            this.$watch('amount', (value) => {
                if (value > 0 && !this.paypalRendered) {
                    this.$nextTick(() => this.renderPayPalButtons());
                }
            });
            
            // Also watch tab changes
            this.$watch('tab', (value) => {
                if (value === 'primary' && this.amount > 0 && !this.paypalRendered) {
                    this.$nextTick(() => this.renderPayPalButtons());
                }
            });
        },

        renderPayPalButtons() {
            const container = document.getElementById('paypal-button-container');
            if (!container || typeof paypal === 'undefined') return;
            
            // Clear existing buttons
            container.innerHTML = '';
            this.paypalRendered = true;

            const self = this;

            paypal.Buttons({
                style: {
                    layout: 'vertical',
                    color: 'blue',
                    shape: 'rect',
                    label: 'paypal',
                    tagline: false
                },

                // Create order on the server
                createOrder: function(data, actions) {
                    self.processing = true;
                    self.paymentError = '';

                    return fetch('{{ route("graphics.payment.create-order") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            amount: self.amount,
                            invoice_id: self.invoiceId,
                        })
                    })
                    .then(res => res.json())
                    .then(order => {
                        if (order.error) {
                            self.paymentError = order.error;
                            self.processing = false;
                            throw new Error(order.error);
                        }
                        self.processing = false;
                        return order.id;
                    })
                    .catch(err => {
                        self.processing = false;
                        self.paymentError = 'Failed to create order. Please try again.';
                        throw err;
                    });
                },

                // Capture order after approval
                onApprove: function(data, actions) {
                    self.processing = true;

                    return fetch('{{ route("graphics.payment.capture-order") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            order_id: data.orderID,
                        })
                    })
                    .then(res => res.json())
                    .then(result => {
                        self.processing = false;
                        if (result.status === 'COMPLETED') {
                            self.paymentSuccess = true;
                            self.transactionId = data.orderID;
                        } else {
                            self.paymentError = 'Payment was not completed. Status: ' + result.status;
                        }
                    })
                    .catch(err => {
                        self.processing = false;
                        self.paymentError = 'Payment capture failed. Please contact support.';
                    });
                },

                onError: function(err) {
                    self.processing = false;
                    self.paymentError = 'Payment error. Please try again or contact support.';
                    console.error('PayPal error:', err);
                },

                onCancel: function(data) {
                    self.processing = false;
                    self.paymentError = '';
                }
            }).render('#paypal-button-container');
        }
    };
}
</script>

@endsection
