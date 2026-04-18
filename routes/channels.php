<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
*/

// Admin channel for receiving notifications of all messages
Broadcast::channel('chat.admin', function ($user) {
    return (bool) $user; // Simple check for authenticated admin
});

// Specific guest channel (public for non-auth users)
// Note: Actual data is sent via public Echo channel in JS, 
// but we define it here if we want to add privacy later.
Broadcast::channel('chat.guest.{token}', function ($user, $token) {
    return true; 
});
