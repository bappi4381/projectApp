@extends('layouts.admin')
@section('title', 'Live Guest Chat')

@section('content')
    <div class="p-8 h-[calc(100vh-80px)] overflow-hidden flex flex-col">
        <div class="flex items-center justify-between mb-8 shrink-0">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Support Conversations</h1>
                <p class="text-slate-400">Real-time engagement with your site guests.</p>
            </div>
        </div>

        <div class="flex-grow overflow-hidden flex gap-6">
            <!-- Users Sidebar -->
            <div class="w-80 shrink-0 flex flex-col gap-4">
                <div class="glass-card rounded-2xl flex flex-col h-full border-white/5 overflow-hidden">
                    <div class="p-4 border-b border-white/5 shrink-0">
                        <h5 class="font-bold text-white">Recent Chats</h5>
                    </div>
                    <div class="flex-grow overflow-y-auto custom-sidebar-scroll" id="chatUsersList">
                        @foreach($users as $user)
                            <button onclick="loadMessages({{ $user->id }})"
                                class="w-full text-left p-4 border-b border-white/5 hover:bg-white/5 transition-all relative group user-item-{{ $user->id }}"
                                id="user-{{ $user->id }}">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 font-bold shrink-0">
                                        {{ strtoupper(substr($user->name ?? $user->email, 0, 1)) }}
                                    </div>
                                    <div class="truncate">
                                        <h6 class="text-white font-bold text-sm truncate">{{ $user->name ?? 'Guest User' }}</h6>
                                        <p class="text-slate-500 text-xs truncate m-0">{{ $user->email }}</p>
                                    </div>
                                    <span
                                        class="absolute right-4 top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-red-500 shadow-[0_0_8px_#ef4444] d-none"
                                        id="unread-{{ $user->id }}"></span>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Chat Area -->
            <div class="flex-grow flex flex-col relative">
                <!-- Chat Window -->
                <div class="glass-card rounded-2xl flex flex-col h-full border-white/5 overflow-hidden" id="chatWindow"
                    style="display: none;">
                    <!-- Header -->
                    <div class="p-4 border-b border-white/5 flex items-center justify-between bg-white/[0.02] shrink-0">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold"
                                id="activeUserAvatar">?</div>
                            <div>
                                <h6 class="text-white font-bold m-0" id="activeUserName text-indigo-100">Select User</h6>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_#10b981]"></span>
                                    <span class="text-[10px] text-emerald-400 font-bold uppercase tracking-wider">Active
                                        Now</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="flex-grow overflow-y-auto p-6 space-y-4 custom-sidebar-scroll bg-slate-900/40"
                        id="messagesContainer">
                        <!-- Messages loaded here -->
                    </div>

                    <!-- Input -->
                    <div class="p-4 bg-white/[0.02] border-t border-white/5 shrink-0">
                        <form id="adminChatForm" class="flex gap-3">
                            <input type="text" id="adminMessageInput"
                                class="flex-grow bg-slate-800/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500/50 transition-all text-sm"
                                placeholder="Type your response...">
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white w-12 h-12 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-600/20 transition-all">
                                <i class="ri-send-plane-2-fill text-xl"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Empty State -->
                <div class="glass-card rounded-2xl flex flex-col items-center justify-center text-center h-full border-white/5"
                    id="chatEmptyState">
                    <div
                        class="w-20 h-20 rounded-3xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 mb-6">
                        <i class="ri-message-3-line text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">No Conversation Selected</h3>
                    <p class="text-slate-400 max-w-xs mx-auto">Select a guest from the left sidebar to view message history
                        and respond.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .custom-sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
        }

        .message-bubble {
            max-width: 80%;
            padding: 12px 16px;
            border-radius: 20px;
            font-size: 13.5px;
            line-height: 1.5;
        }

        .message-guest {
            background: rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom-left-radius: 4px;
        }

        .message-admin {
            background: #4f46e5;
            color: white;
            border-bottom-right-radius: 4px;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.2);
        }
    </style>

    @push('scripts')
        <script>
            let activeGuestId = null;

            function loadMessages(guestId) {
                activeGuestId = guestId;
                document.getElementById('chatEmptyState').style.display = 'none';
                document.getElementById('chatWindow').style.display = 'flex';

                document.querySelectorAll('.user-item-' + guestId).forEach(el => {
                    document.querySelectorAll('button[id^="user-"]').forEach(btn => btn.classList.remove('bg-white/5', 'border-indigo-500/50'));
                    el.classList.add('bg-white/5', 'border-indigo-500/50');
                });

                const userName = document.getElementById('user-' + guestId).querySelector('h6').innerText;
                document.getElementById('activeUserName').innerText = userName;
                document.getElementById('activeUserAvatar').innerText = userName.charAt(0).toUpperCase();

                fetch(`/admin/graphics/chat/messages/${guestId}`)
                    .then(res => res.json())
                    .then(data => {
                        renderMessages(data.messages);
                        scrollToBottom();
                    });
            }

            function renderMessages(messages) {
                const container = document.getElementById('messagesContainer');
                container.innerHTML = '';
                messages.forEach(msg => appendMessage(msg, false));
            }

            function appendMessage(msg, scroll = true) {
                const container = document.getElementById('messagesContainer');
                const div = document.createElement('div');
                div.className = `flex flex-col ${msg.sender_type === 'admin' ? 'items-end' : 'items-start'}`;

                const time = new Date(msg.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                div.innerHTML = `
                <div class="message-bubble ${msg.sender_type === 'admin' ? 'message-admin' : 'message-guest'}">
                    <span>${msg.message}</span>
                    <div class="text-[10px] opacity-60 mt-1 ${msg.sender_type === 'admin' ? 'text-right' : 'text-left'}">${time}</div>
                </div>
            `;

                container.appendChild(div);
                if (scroll) scrollToBottom();
            }

            function scrollToBottom() {
                const container = document.getElementById('messagesContainer');
                container.scrollTop = container.scrollHeight;
            }

            document.getElementById('adminChatForm').addEventListener('submit', function (e) {
                e.preventDefault();
                const input = document.getElementById('adminMessageInput');
                const message = input.value;
                if (!message || !activeGuestId) return;

                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                fetch('/admin/graphics/chat/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ guest_id: activeGuestId, message: message })
                })
                    .then(async res => {
                        const data = await res.json();
                        if (res.ok && data.status === 'success') {
                            appendMessage(data.message);
                            input.value = '';
                        } else {
                            alert('Error: ' + (data.message || 'Could not send message'));
                        }
                    })
                    .catch(err => {
                        console.error('Admin send fail:', err);
                        alert('Failed to connect to server.');
                    });
            });

            // Polling Fallback (Backup for messages)
            setInterval(() => {
                if (activeGuestId) {
                    fetch(`/admin/graphics/chat/messages/${activeGuestId}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'success') {
                                renderMessages(data.messages);
                            }
                        });
                }
            }, 5000);

            // User List Refresh (to see new chats)
            setInterval(() => {
                fetch(window.location.href)
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newList = doc.querySelector('#userListContainer');
                        if (newList) {
                            document.querySelector('#userListContainer').innerHTML = newList.innerHTML;
                        }
                    });
            }, 10000);

            // Real-time listener (Primary)
            if (window.Echo) {
                window.Echo.private('chat.admin')
                    .listen('.MessageSent', (e) => {
                        console.log('Real-time message received:', e);
                        if (activeGuestId == e.message.guest_chat_user_id) {
                            // If this is the active user, refresh their messages
                            fetch(`/admin/graphics/chat/messages/${activeGuestId}`)
                                .then(res => res.json())
                                .then(data => renderMessages(data.messages));
                        }
                        // Trigger a list refresh immediately to show unread status
                        location.reload(); // Simple way for list update, can be optimized later
                    });
            }
        </script>
    @endpush
@endsection