<div id="itChatWidget" 
     x-data="itChat()"
     class="fixed bottom-10 right-10 z-[999999] font-sans" 
     x-cloak>
    
    <!-- Chat Toggle Node -->
    <button @click="toggle()" 
            class="relative w-16 h-16 rounded-[1.5rem] bg-sky-500 text-white flex items-center justify-center shadow-2xl transition-all duration-500 group border border-white/20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-sky-400 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
        <template x-if="!isOpen">
            <div class="relative z-10 flex flex-col items-center">
                <i class="ri-chat-smile-2-fill text-2xl mb-0.5"></i>
                <span class="text-[8px] font-black uppercase tracking-[0.2em] opacity-90">Chat</span>
            </div>
        </template>
        <template x-if="isOpen">
            <i class="ri-close-line text-3xl relative z-10 animate-spin-once"></i>
        </template>
        <span class="absolute inset-0 rounded-2xl bg-cyan-500 animate-ping opacity-10" x-show="!isOpen"></span>
    </button>

    <!-- Communication Hub (HUD Style) -->
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-500 transform"
         x-transition:enter-start="translate-y-12 scale-75 opacity-0 blur-sm"
         x-transition:enter-end="translate-y-0 scale-100 opacity-100 blur-0"
         x-transition:leave="transition ease-in duration-300 transform"
         x-transition:leave-start="translate-y-0 scale-100 opacity-100 blur-0"
         x-transition:leave-end="translate-y-12 scale-75 opacity-0 blur-sm"
         class="absolute bottom-24 right-0 w-[90vw] sm:w-[350px] h-[550px] bg-sky-50 rounded-3xl shadow-[0_30px_100px_rgba(14,165,233,0.2)] overflow-hidden flex flex-col border border-sky-200">
        
        <!-- Header: Sky Blue HUD -->
        <div class="p-6 bg-gradient-to-r from-sky-500 to-blue-600 flex items-center justify-between shrink-0 shadow-lg">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-sky-600 shadow-lg">
                        <i class="ri-customer-service-2-line text-2xl"></i>
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-400 border-4 border-sky-500 rounded-full animate-pulse"></div>
                </div>
                <div class="text-left">
                    <h6 class="text-white font-black text-[13px] uppercase tracking-widest leading-none mb-1.5">Support Desk</h6>
                    <div class="flex items-center gap-2">
                        <div class="w-1.5 h-1.5 rounded-full bg-emerald-300"></div>
                        <span class="text-sky-100 text-[10px] font-bold uppercase tracking-widest">Engineer is Online</span>
                    </div>
                </div>
            </div>
            <button @click="isOpen = false" class="text-white/70 hover:text-white transition-colors">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>

        <!-- Identification Form (Clean Sky Style) -->
        <div x-show="!isRegistered" class="flex-grow p-8 flex flex-col justify-center bg-white">
            <div class="mb-10 text-center">
                <div class="w-16 h-16 bg-sky-50 rounded-3xl flex items-center justify-center mx-auto mb-6 text-sky-500">
                    <i class="ri-message-3-fill text-3xl"></i>
                </div>
                <h5 class="text-2xl font-black text-slate-900 uppercase tracking-tighter mb-2">Start <span class="text-sky-500">Chatting</span></h5>
                <p class="text-slate-500 text-[11px] font-medium uppercase tracking-[0.2em] leading-relaxed">Please introduce yourself to establish a support link.</p>
            </div>
            
            <form @submit.prevent="initChat()" class="space-y-4">
                <div class="space-y-1.5">
                    <input type="text" x-model="formData.name" placeholder="YOUR FULL NAME" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:border-sky-500/50 focus:ring-0 text-slate-900 text-sm outline-none transition-all placeholder:text-slate-400 font-bold tracking-wider">
                </div>
                <div class="space-y-1.5">
                    <input type="email" x-model="formData.email" placeholder="YOUR EMAIL ADDRESS" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:border-sky-500/50 focus:ring-0 text-slate-900 text-sm outline-none transition-all placeholder:text-slate-400 font-bold tracking-wider">
                </div>
                <button type="submit" class="w-full mt-6 py-4 bg-sky-500 text-white rounded-2xl font-black uppercase text-[11px] tracking-[0.3em] shadow-xl shadow-sky-500/30 hover:bg-sky-600 active:scale-95 transition-all">
                    Start Conversation
                </button>
            </form>
        </div>

        <!-- Chat Console -->
        <div x-show="isRegistered" class="flex-grow flex flex-col h-full overflow-hidden bg-white">
            <div id="itGuestMessagesContainer" class="flex-grow overflow-y-auto p-6 flex flex-col gap-5 custom-sidebar-scroll bg-slate-50">
                <!-- Messages -->
            </div>
            
            <div class="p-4 bg-white border-t border-slate-100 shrink-0">
                <form @submit.prevent="sendMessage()" class="flex items-center gap-3">
                    <input type="text" x-model="messageBody" placeholder="Write your message..." class="flex-grow bg-slate-100 border border-slate-200 rounded-2xl px-6 py-3.5 text-sm focus:border-sky-500/50 outline-none text-slate-900 placeholder:text-slate-400 transition-all font-medium">
                    <button type="submit" class="w-12 h-12 bg-sky-500 hover:bg-sky-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-sky-500/20 active:scale-90 transition-all">
                        <i class="ri-send-plane-2-fill text-xl"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function itChat() {
    return {
        isOpen: false,
        isRegistered: false,
        sessionToken: localStorage.getItem('chat_session_token'),
        messageBody: '',
        formData: { email: '', name: '' },
        async init() {
            if (this.sessionToken) {
                this.isRegistered = true;
                await this.loadHistory();
                this.startListeners();
            }
        },
        toggle() { this.isOpen = !this.isOpen; },
        async initChat() {
            if(!this.formData.email) return;
            try {
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                const res = await fetch('/chat/init', {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify(this.formData)
                });
                const data = await res.json();
                if(data.status === 'success') {
                    this.isRegistered = true;
                    this.sessionToken = data.user.session_token;
                    localStorage.setItem('chat_session_token', this.sessionToken);
                    this.renderMessages(data.history);
                    this.startListeners();
                }
            } catch (err) { console.error('IT Chat init fail:', err); }
        },
        startListeners() {
            if (!this.sessionToken) return;
            
            // Polling Fallback (Every 5s if Echo is not available)
            setInterval(() => {
                if (!window.Echo || !window.Echo.connector.pusher.connected) {
                    this.loadHistory();
                }
            }, 5000);

            // Real-time (Primary)
            if (window.Echo) {
                window.Echo.channel('chat.guest.' + this.sessionToken)
                    .listen('.MessageSent', (e) => {
                        this.appendMessage(e.message);
                    });
            }
        },
        async sendMessage() {
            if(!this.messageBody.trim() || !this.sessionToken) return;
            const body = this.messageBody;
            this.messageBody = '';
            
            try {
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                const res = await fetch('/chat/send', {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ session_token: this.sessionToken, message: body })
                });
                const data = await res.json();
                if(data.status === 'success') {
                    this.appendMessage(data.message);
                } else {
                    this.messageBody = body;
                }
            } catch (err) { 
                console.error('IT Send fail:', err);
                this.messageBody = body;
            }
        },
        async loadHistory() {
            try {
                const res = await fetch('/chat/history/' + this.sessionToken);
                const data = await res.json();
                if (data.status === 'success') this.renderMessages(data.history);
            } catch (err) { console.error('IT Load History fail:', err); }
        },
        appendMessage(msg) {
            const container = document.getElementById('itGuestMessagesContainer');
            if(!container) return;
            
            // Avoid duplicate messages in UI
            if (document.getElementById('msg-' + (msg.id || msg.temp_id))) return;

            const div = document.createElement('div');
            div.id = 'msg-' + (msg.id || msg.temp_id);
            div.className = 'flex flex-col ' + (msg.sender_type === 'guest' ? 'items-end' : 'items-start');
            
            const time = new Date(msg.created_at || Date.now()).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            div.innerHTML = `
                <div class="px-5 py-3.5 rounded-2xl max-w-[85%] text-[13px] font-medium leading-relaxed shadow-sm ${
                    msg.sender_type === 'guest' 
                    ? 'bg-sky-500 text-white rounded-br-none shadow-sky-500/20' 
                    : 'bg-white text-slate-800 border border-sky-100 rounded-bl-none'
                }">
                    ${msg.message}
                    <div class="text-[9px] opacity-40 mt-1.5 ${msg.sender_type === 'guest' ? 'text-right' : 'text-left'} uppercase font-black tracking-widest">${time}</div>
                </div>
            `;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        },
        renderMessages(messages) {
            const container = document.getElementById('itGuestMessagesContainer');
            if(!container) return;
            container.innerHTML = '';
            messages.forEach(msg => this.appendMessage(msg));
        }
    }
}
</script>

<style>
    .animate-spin-once { animation: spin 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(180deg); } }
    
    #itGuestMessagesContainer::-webkit-scrollbar {
        width: 4px;
    }
    #itGuestMessagesContainer::-webkit-scrollbar-track {
        background: transparent;
    }
    #itGuestMessagesContainer::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
    }
</style>
