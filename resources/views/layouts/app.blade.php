<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIP-LAB') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <div class="min-h-screen flex flex-col justify-between">

        <div>
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white shadow-sm border-b border-gray-100 z-10 relative">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="w-full">
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-white border-t border-gray-100 mt-auto">
            <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6">

                    <div class="text-center md:text-left">
                        <div class="flex items-center justify-center md:justify-start gap-2 mb-2">
                            <div class="w-6 h-6 bg-indigo-600 rounded flex items-center justify-center shadow-sm">
                                <x-application-logo class="w-4 h-4 fill-current text-white" />
                            </div>
                            <span class="font-extrabold text-gray-900 tracking-tight">SIP<span
                                    class="text-indigo-600">LAB</span></span>
                        </div>
                        <p class="text-xs text-gray-400 leading-relaxed">
                            &copy; {{ date('Y') }} Politeknik - Jambi, Indonesia.<br>
                            Sistem Informasi Pengelolaan Laboratorium Terpadu.
                        </p>
                    </div>

                    <div class="flex flex-col items-center md:items-end gap-4">
                        <div class="flex items-center space-x-6">
                            <a href="#"
                                class="text-xs font-semibold text-gray-500 hover:text-indigo-600 transition-colors duration-200">
                                Pusat Bantuan
                            </a>
                            <a href="#"
                                class="text-xs font-semibold text-gray-500 hover:text-indigo-600 transition-colors duration-200">
                                Kebijakan Privasi
                            </a>
                            <a href="#"
                                class="text-xs font-semibold text-gray-500 hover:text-indigo-600 transition-colors duration-200">
                                Kontrak Layanan
                            </a>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="h-px w-8 bg-gray-100"></span>
                            <span
                                class="text-[10px] font-bold font-mono text-gray-400 bg-gray-50 border border-gray-100 px-2 py-1 rounded-full uppercase tracking-widest">
                                Build v1.0.4
                            </span>
                        </div>
                    </div>

                </div>

                <div class="mt-8 pt-8 border-t border-gray-50 text-center">
                    <p class="text-[10px] text-gray-300 uppercase tracking-[0.2em]">
                        Jl. Lingkar Barat No. 108 Kenali Besar, Kota Baru Jambi
                    </p>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
