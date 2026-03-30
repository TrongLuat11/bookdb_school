<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

        <!-- Tailwind CSS Play CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Figtree', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        },
                    },
                },
            }
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#f3f4f6]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-8">
                <a href="/">
                    <img src="{{ asset('hinh/logo_hub.png') }}" alt="Logo HUB"  width ="300px">
                </a>
            </div>

            <div class="w-full sm:max-w-md px-10 py-10 bg-white shadow-[0_4px_20px_-5px_rgba(0,0,0,0.1)] overflow-hidden rounded-2xl border border-gray-100/50">
                {{ $slot }}
            </div>
        </div>
    </body>

</html>