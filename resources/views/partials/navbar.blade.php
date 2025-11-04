<nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-sm shadow-sm transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gradient">
                    Inno
                </a>
            </div>

        {{-- Desktop Navigation --}}
        <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>
                <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}">
                    Portfolio
                </a>
                <a href="{{ route('resume') }}" class="nav-link {{ request()->routeIs('resume') ? 'active' : '' }}">
                    Resume
                </a>
                <a href="{{ route('blog') }}" class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">
                    Blog
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>
            </div>
        </div>

        {{-- Mobile Menu button --}}
        <div class="md:hidden">
            <button type="button" class="mobile-menu-button">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="md:hidden mobile-menu hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white shadow-lg">
            <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('resume') }}" class="mobile-nav-link {{ request()->routeIs('resume') ? 'active' : '' }}">Resume</a>
            <a href="{{ route('portfolio') }}" class="mobile-nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}">Portfolio</a>
            <a href="{{ route('blog') }}" class="mobile-nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a>
            <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
    </div>
</nav>