@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh] text-center space-y-6">
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Golden Key Logo"
            class="h-28 w-auto mb-4 drop-shadow-[0_0_25px_rgba(236,196,103,0.4)]">

        <h1 class="text-4xl md:text-5xl font-extrabold text-[#ecc467] tracking-wide">
            Welcome Back, {{ Auth::user()->name ?? 'Administrator' }}!
        </h1>

        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mt-4">
            You’re now logged in to the <span class="text-[#ecc467] font-semibold">Golden Key</span> Admin Panel.
        </p>
    </div>
</div>
@endsection