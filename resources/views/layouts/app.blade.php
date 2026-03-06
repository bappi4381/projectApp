<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'PixelForge Group — Where Visual Excellence Meets Digital Innovation. Specialists in Creative Graphics and Enterprise IT Solutions.')">
    <title>@yield('title', 'PixelForge Group | Creative & Digital Excellence')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    {{-- Remix Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    {{-- Alpine.js (Essential for Interactivity) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        /* ── Loader styles ───────────────────────────── */
        #page-loader {
            position: fixed; inset: 0; z-index: 9999;
            background: #020817;
            display: flex; align-items: center; justify-content: center;
            /* CSS hard-timeout: always hide after 2.5s no matter what */
            animation: loader-auto-hide 0s 2.5s forwards;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        @keyframes loader-auto-hide {
            to { opacity: 0; visibility: hidden; pointer-events: none; }
        }
        #page-loader.loaded {
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes spin-r { to { transform: rotate(-360deg); } }

        /* ── Lenis classes ───────────────────────────── */
        html.lenis, html.lenis body { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto !important; }
        .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
        .lenis.lenis-stopped { overflow: hidden; }
    </style>
</head>
<body class="bg-slate-950 text-white antialiased font-sans">

    {{-- ── Page Loader ──────────────────────────────── --}}
    <div id="page-loader" aria-hidden="true">
        <div style="display:flex;flex-direction:column;align-items:center;gap:14px">
            <div style="position:relative;width:46px;height:46px">
                <div style="position:absolute;inset:0;border-radius:50%;border:2px solid rgba(99,102,241,0.12)"></div>
                <div style="position:absolute;inset:0;border-radius:50%;border:2px solid transparent;border-top-color:#818cf8;animation:spin 0.75s linear infinite"></div>
                <div style="position:absolute;inset:9px;border-radius:50%;border:2px solid transparent;border-top-color:#22d3ee;animation:spin-r 1.1s linear infinite"></div>
            </div>
            <span style="font-size:10px;letter-spacing:0.2em;color:#334155;text-transform:uppercase;font-family:'Inter',sans-serif;font-weight:500">Loading</span>
        </div>
    </div>

    {{-- Navbar --}}
    @if(Request::routeIs('graphics.index'))
        @include('graphics.partials.graphics-navbar')
    @elseif(Request::routeIs('it.index'))
        @include('it.partials.it-navbar')
    @else
        @include('partials.navbar')
    @endif

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @if(Request::routeIs('graphics.index'))
        @include('graphics.partials.footer')
    @elseif(!Request::routeIs('it.index'))
        @include('partials.footer')
    @endif

    @stack('scripts')

    {{-- ── Lenis Smooth Scroll (loaded async — non-blocking) ── --}}
    <script>
    // ── 1. LOADER HIDE — runs unconditionally, always ────────────
    function hideLoader() {
        var loader = document.getElementById('page-loader');
        if (loader) loader.classList.add('loaded');
    }
    // Fire when DOM + resources are ready
    if (document.readyState === 'complete') {
        setTimeout(hideLoader, 300);
    } else {
        window.addEventListener('load', function () {
            setTimeout(hideLoader, 300);
        });
    }

    // ── 2. SCROLL REVEAL — runs unconditionally ──────────────────
    (function () {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.10, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.reveal').forEach(function (el) {
            revealObserver.observe(el);
        });
    })();

    // ── 3. NAVBAR SCROLL COLOR — native scroll fallback ─────────
    window.addEventListener('scroll', function () {
        var nav = document.getElementById('main-navbar');
        if (!nav) return;
        if (window.pageYOffset > 30) {
            nav.classList.add('nav-scrolled');
        } else {
            nav.classList.remove('nav-scrolled');
        }
    }, { passive: true });

    // ── 4. SMOOTH ANCHOR CLICKS — CSS scroll-behavior fallback ──
    document.querySelectorAll('a[href^="#"], a[href*="/#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var href = this.getAttribute('href');
            var hashIdx = href.indexOf('#');
            if (hashIdx === -1) return;
            var targetEl = document.getElementById(href.slice(hashIdx + 1));
            if (!targetEl) return;
            e.preventDefault();
            var top = targetEl.getBoundingClientRect().top + window.pageYOffset - 80;
            window.scrollTo({ top: top, behavior: 'smooth' });
        });
    });
    </script>

    {{-- ── Lenis loaded async after page ready — optional enhancement ── --}}
    <script>
    window.addEventListener('load', function () {
        // Load Lenis asynchronously — won't block page if CDN is slow/offline
        var script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/lenis@1.1.14/dist/lenis.min.js';
        script.onload = function () {
            try {
                var lenis = new Lenis({
                    duration: 1.25,
                    easing: function (t) { return Math.min(1, 1.001 - Math.pow(2, -10 * t)); },
                    smoothWheel: true,
                    smoothTouch: false,
                    touchMultiplier: 2,
                });
                window.lenis = lenis;

                // Override smooth anchor scroll to use Lenis
                document.querySelectorAll('a[href^="#"], a[href*="/#"]').forEach(function (anchor) {
                    anchor.addEventListener('click', function (e) {
                        var href = this.getAttribute('href');
                        var hashIdx = href.indexOf('#');
                        if (hashIdx === -1) return;
                        var targetEl = document.getElementById(href.slice(hashIdx + 1));
                        if (!targetEl) return;
                        e.preventDefault();
                        lenis.scrollTo(targetEl, {
                            offset: -80,
                            duration: 1.5,
                            easing: function (t) { return 1 - Math.pow(1 - t, 4); }
                        });
                    });
                });

                // Feed Lenis into the navbar scroll handler
                lenis.on('scroll', function (e) {
                    var nav = document.getElementById('main-navbar');
                    if (!nav) return;
                    if (e.scroll > 30) {
                        nav.classList.add('nav-scrolled');
                    } else {
                        nav.classList.remove('nav-scrolled');
                    }
                });

                // rAF ticker
                function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
                requestAnimationFrame(raf);

            } catch (err) {
                console.warn('[PixelForge] Lenis failed to init — native scroll active.', err);
            }
        };
        script.onerror = function () {
            console.warn('[PixelForge] Lenis CDN unreachable — native smooth scroll active.');
        };
        document.head.appendChild(script);
    });
    </script>

</body>
</html>

