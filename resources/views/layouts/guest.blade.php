<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MantaPS - Authentication</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .glass { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .text-gradient { background: linear-gradient(to right, #60a5fa, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-[#0f172a] text-slate-200 antialiased font-sans overflow-x-hidden">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-blue-500/10 blur-[120px] rounded-full -z-10"></div>
        
        <div class="mb-8">
            <a href="/">
                <img src="{{ asset('assets/LOGO_MANTAPS.png') }}" alt="MantaPS Logo" class="h-12">
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-10 py-12 glass shadow-2xl overflow-hidden sm:rounded-[3rem]">
            {{ $slot }}
        </div>
    </div>
</body>
</html>