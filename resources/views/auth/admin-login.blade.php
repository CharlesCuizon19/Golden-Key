<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Silid Cuadrado</title>
    @vite('resources/css/app.css') <!-- Laravel Vite + Tailwind -->
</head>

<body class="h-screen w-screen bg-gradient-to-br from-[#121212] via-[#1a1a1a] to-[#2a2a2a] flex items-center justify-center">

    <div class="grid grid-cols-1 md:grid-cols-2 w-full h-full">

        <!-- Left Side -->
        <div class="hidden md:flex bg-[#0f0f0f] items-center justify-center relative overflow-hidden">
            <!-- Gold Glow -->
            <div class="absolute w-[500px] h-[500px] bg-[#ecc467]/20 rounded-full blur-3xl"></div>

            <!-- Logo + Text -->
            <div class="flex flex-col items-center text-center relative z-10 transform hover:scale-105 transition-transform duration-500">
                <img src="{{ asset('images/logo.png') }}" alt="Golden Key"
                    class="h-28 mb-6 drop-shadow-[0_10px_20px_rgba(236,196,103,0.5)]">

                <div>
                    <h1 class="text-4xl font-extrabold text-[#ecc467] tracking-wide drop-shadow-lg">GOLDEN KEY</h1>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="flex items-center justify-center px-6 relative">
            <div
                class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 transform transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.25)]">

                <!-- Heading -->
                <h2 class="text-3xl font-bold text-[#1a1a1a] mb-6 flex items-center gap-2">
                    <span class="border-l-4 border-[#ecc467] pl-2"></span>
                    <span class="drop-shadow-md">Administrator <span class="font-normal">Login</span></span>
                </h2>

                <!-- Success Message -->
                @if(session('success'))
                <div
                    class="bg-green-100 text-green-700 p-2 rounded mb-4 text-center text-sm font-medium shadow-inner">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Error Message -->
                @if($errors->any())
                <div
                    class="bg-red-100 text-red-700 p-2 rounded mb-4 text-center text-sm font-medium shadow-inner">
                    {{ $errors->first() }}
                </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-600 mb-1 font-medium">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-[#ecc467] focus:ring-2 focus:ring-[#ecc467]/50 shadow-sm"
                            placeholder="Enter your email" required autofocus>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-gray-600 mb-1 font-medium">Password</label>
                        <input type="password" name="password"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-[#ecc467] focus:ring-2 focus:ring-[#ecc467]/50 shadow-sm"
                            placeholder="Enter your password" required>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-[#ecc467] text-white py-3 rounded-lg font-semibold shadow-lg transform transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(236,196,103,0.5)] hover:bg-[#d4b24a]">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>