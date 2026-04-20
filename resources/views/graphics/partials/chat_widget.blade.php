<div id="guestChatWidget" 
     x-data="graphicsChat()"
     class="fixed bottom-6 right-6 z-[999999] font-sans text-gray-900" 
     x-cloak>
    
    <!-- Chat Toggle Bubble -->
    <button @click="toggle()" 
            class="w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-2xl hover:scale-110 transition-all duration-300 relative group">
        <template x-if="!isOpen">
            <i class="fas fa-comment-dots text-2xl transition-transform group-hover:rotate-12"></i>
        </template>
        <template x-if="isOpen">
            <i class="fas fa-times text-2xl animate-spin-once"></i>
        </template>
        <span class="absolute inset-0 rounded-full bg-blue-600 animate-ping opacity-20" x-show="!isOpen"></span>
    </button>

    <!-- Chat Box -->
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-y-10 scale-95 opacity-0"
         x-transition:enter-end="translate-y-0 scale-100 opacity-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="translate-y-0 scale-100 opacity-100"
         x-transition:leave-end="translate-y-10 scale-95 opacity-0"
         class="absolute bottom-20 right-0 w-[85vw] sm:w-[350px] h-[500px] bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col border border-gray-100">
        
        <!-- Header -->
        <div class="bg-blue-600 p-4 flex items-center gap-3 shrink-0">
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name=Admin&background=ffffff&color=2563eb" alt="Support" class="w-10 h-10 rounded-full border-2 border-white/20">
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-blue-600 rounded-full"></span>
            </div>
            <div class="text-left">
                <h6 class="text-white font-bold m-0 text-sm">PixelForge Support</h6>
                <p class="text-blue-100 text-xs m-0">Typically replies in minutes</p>
            </div>
        </div>

        <!-- Identification Form -->
        <div x-show="!isRegistered" class="flex-grow p-6 flex flex-col justify-center text-center bg-white">
            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-paper-plane text-blue-600 text-2xl"></i>
            </div>
            <h5 class="text-xl font-bold mb-2">Chat with us!</h5>
            <p class="text-gray-500 text-sm mb-6 px-4">Hello! Please introduce yourself to start the conversation.</p>
            
            <form @submit.prevent="initChat()" class="space-y-4 px-2">
                <input type="text" x-model="formData.name" placeholder="Full Name" class="w-full px-4 py-2 bg-gray-50 border border-gray-100 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm outline-none transition-all">
                <input type="email" x-model="formData.email" placeholder="Email Address *" required class="w-full px-4 py-2 bg-gray-50 border border-gray-100 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm outline-none transition-all text-gray-900">
                <button type="submit" class="w-full py-2.5 bg-blue-600 text-white rounded-lg font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-colors">Start Chat</button>
            </form>
        </div>

        <!-- Chat Conversation -->
        <div x-show="isRegistered" class="flex-grow flex flex-col h-full overflow-hidden bg-gray-50">
            <div id="guestMessagesContainer" class="flex-grow overflow-y-auto p-4 flex flex-col gap-3">
                <!-- Messages -->
            </div>
            
            <div class="p-4 bg-white border-t border-gray-100 shrink-0">
                <form @submit.prevent="sendMessage()" class="flex items-center gap-2">
                    <input type="text" x-model="messageBody" placeholder="Message..." class="flex-grow bg-gray-100 border-0 rounded-full px-4 py-2 text-sm focus:ring-0 outline-none text-gray-900">
                    <button type="submit" class="text-blue-600 hover:text-blue-700 p-1 flex items-center justify-center">
                        <svg class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20 font-bold"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function graphicsChat() {
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
            this.isLoading = true;
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
            } catch (err) { console.error('Chat init fail:', err); }
            this.isLoading = false;
        },
        startListeners() {
            if (!this.sessionToken) return;
            
            // Polling Fallback
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
            this.messageBody = ''; // Clear early for UX
            
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
                    this.messageBody = body; // Restore on fail
                }
            } catch (err) { 
                console.error('Send fail:', err);
                this.messageBody = body;
            }
        },
        async loadHistory() {
            const res = await fetch('/chat/history/' + this.sessionToken);
            const data = await res.json();
            if (data.status === 'success') this.renderMessages(data.history);
        },
        appendMessage(msg) {
            const container = document.getElementById('guestMessagesContainer');
            if(!container) return;
            const div = document.createElement('div');
            div.className = 'flex flex-col ' + (msg.sender_type === 'guest' ? 'items-end' : 'items-start');
            div.innerHTML = `<div class="px-3 py-2 rounded-2xl max-w-[85%] text-sm leading-tight shadow-sm ${msg.sender_type === 'guest' ? 'bg-blue-600 text-white rounded-br-none' : 'bg-white text-gray-800 border border-gray-100 rounded-bl-none'}">${msg.message}</div>`;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        },
        renderMessages(messages) {
            const container = document.getElementById('guestMessagesContainer');
            if(!container) return;
            container.innerHTML = '';
            messages.forEach(msg => this.appendMessage(msg));
        }
    }
}
</script>

<style>
    [x-cloak] { display: none !important; }
    .animate-spin-once { animation: spin 0.3s linear; }
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(180deg); } }
</style>
