<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Golden Key Admin')</title>
    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- DataTables & SweetAlert -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icon-img.png') }}">
</head>

<body x-data="{ sidebarOpen: true }" class="flex min-h-screen bg-[#121212] text-white">

    {{-- Sidebar --}}
    <aside
        :class="sidebarOpen ? 'w-64' : 'w-20'"
        class="bg-[#1a1a1a] flex-shrink-0 flex flex-col justify-between min-h-screen transition-all duration-300 shadow-lg border-r border-[#2c2c2c]">

        <!-- Top Section -->
        <div>
            <!-- Logo + Toggle -->
            <div class="flex items-center justify-between p-4 border-b border-[#2c2c2c]">
                <!-- Full Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Golden Key Logo"
                    class="h-10 w-auto" x-show="sidebarOpen" x-transition>

                <!-- Small Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="h-10 w-auto mx-auto" x-show="!sidebarOpen" x-transition>

                <!-- Toggle Button -->
                <button class="text-gray-400 hover:text-[#ecc467]" @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 transform transition-transform duration-300"
                        :class="sidebarOpen ? 'rotate-0' : 'rotate-180'"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="p-4 text-sm">
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                {{ request()->routeIs('admin.dashboard') ? 'bg-[#ecc467]/20 text-[#ecc467]' : 'hover:bg-[#ecc467]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <!-- Dashboard Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <!-- Homepage Banner -->
                    <li>
                        <a href="{{ route('admin.banners.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                {{ request()->routeIs('admin.banners.*') ? 'bg-[#ecc467]/20 text-[#ecc467]' : 'hover:bg-[#ecc467]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <!-- Banner Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Homepage Banner</span>
                        </a>
                    </li>

                    <!-- Unit Type -->
                    <li>
                        <a href="{{ route('admin.unit-type.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
        {{ request()->routeIs('admin.unit-type.*') ? 'bg-[#ecc467]/20 text-[#ecc467]' : 'hover:bg-[#ecc467]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <!-- Tag Icon for Unit Type -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 7h.01M4 4h16v16H4V4z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Unit Type</span>
                        </a>
                    </li>

                    <!-- Units -->
                    <li>
                        <a href="{{ route('admin.units.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
        {{ request()->routeIs('admin.units.*') ? 'bg-[#ecc467]/20 text-[#ecc467]' : 'hover:bg-[#ecc467]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <!-- Home Icon for Units -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l9-9 9 9v9a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H3v-9z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Units</span>
                        </a>
                    </li>

                    <!-- Agents -->
                    <li>
                        <a href="{{ route('admin.agents.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
        {{ request()->routeIs('admin.agents.*') ? 'bg-[#ecc467]/20 text-[#ecc467]' : 'hover:bg-[#ecc467]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <!-- User Icon for Agents -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.121 17.804A6 6 0 1118.879 17.804M12 7a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Agents</span>
                        </a>
                    </li>

                    <!-- Inquiry -->
                    <li>
                        <a href="{{ route('admin.inquiries.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                {{ request()->routeIs('admin.inquiries.*') ? 'bg-[#ecc467]/20 text-[#ecc467]' : 'hover:bg-[#ecc467]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <!-- Inquiry Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 10h.01M12 10h.01M16 10h.01M21 16v-5a2 2 0 00-2-2H5a2 2 0 00-2 2v5a2 2 0 002 2h14a2 2 0 002-2z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Inquiries</span>
                        </a>
                    </li>

                    <!-- Contact Us -->
                    <li>
                        <a href="{{ route('admin.contact-us.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                {{ request()->routeIs('admin.contact-us.*') ? 'bg-[#ecc467]/20 text-[#ecc467]' : 'hover:bg-[#ecc467]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">

                            <!-- Contact Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8V7a2 2 0 00-2-2H5a2 2 0 00-2 2v1M21 8l-9 6-9-6M3 8v8a2 2 0 002 2h14a2 2 0 002-2V8" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Contact Us</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('admin.logout') }}" class="p-4 border-t border-[#2c2c2c]">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg font-semibold text-gray-300 hover:bg-[#ecc467]/10 hover:text-[#ecc467] transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
                <span x-show="sidebarOpen" x-transition>Logout</span>
            </button>
        </form>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-[#1a1a1a] border-b border-[#2c2c2c] p-4 flex justify-between items-center">
            <h1 class="text-lg font-semibold text-[#ecc467]">@yield('title')</h1>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 bg-[#121212] text-gray-100">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>

<style>
    table.dataTable thead th {
        border-bottom: 1px solid #2c2c2c;
        border-left: 1px solid #2c2c2c;
        border-right: 1px solid #2c2c2c;
        font-size: 12px;
        font-weight: bold;
        padding: 4px;
        color: #ecc467;
    }

    table.dataTable td {
        border-bottom: 1px solid #2c2c2c;
        border-left: 1px solid #2c2c2c;
        border-right: 1px solid #2c2c2c;
        font-size: 11px;
        padding: 0;
        color: #f0f0f0;
    }

    table.dataTable tfoot th,
    table.dataTable tfoot td {
        border-top: 2px solid #2c2c2c;
        border-left: 1px solid #2c2c2c;
        border-right: 1px solid #2c2c2c;
        font-size: 11px;
        font-weight: bold;
        color: #ecc467;
    }
</style>