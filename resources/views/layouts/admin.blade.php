<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | PixelForge Admin</title>
    
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Remix Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
    
    @stack('styles')
    
    <script src="https://www.google.com/recaptcha/api.js?render=YOUR_RECAPTCHA_SITE_KEY"></script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #020617; /* slate-950 */
        }
        .reveal-delay-1 { transition-delay: 100ms; }
        .reveal-delay-2 { transition-delay: 200ms; }
        .reveal-delay-3 { transition-delay: 300ms; }
    </style>
</head>
<body class="text-slate-200 antialiased selection:bg-indigo-500/30 flex min-h-screen">
    
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10 auth-gradient"></div>

    {{-- Main Admin App Structure --}}
    @auth
        @if(!isset($no_sidebar))
            @include('admin.partials.sidebar')
        @endif
    @endauth

    <main id="app" class="flex-grow min-w-0 order-last">
        @yield('content')
    </main>

    @stack('scripts')
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Re-trigger reveal animation logic for admin
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
        
        // Mock reCAPTCHA execution
        function executeRecaptcha() {
            if (typeof grecaptcha !== 'undefined') {
                grecaptcha.ready(function() {
                    grecaptcha.execute('YOUR_RECAPTCHA_SITE_KEY', {action: 'login'}).then(function(token) {
                        // In a real app, send token with form submission
                        document.getElementById('recaptcha_token').value = token;
                    });
                });
            }
        }
    </script>
</body>
</html>
