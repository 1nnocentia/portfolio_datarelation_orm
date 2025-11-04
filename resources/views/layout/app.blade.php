<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="bg-white text-gray-900 font-sans antialiased">
    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Scripts --}}
    @stack('scripts')
    @include('partials.mobile-menu-script')
</body>
</html>