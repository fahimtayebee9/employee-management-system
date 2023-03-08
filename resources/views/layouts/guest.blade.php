<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            .w-30{
                width: 30%!important;
            }
            .w-full form label, .items-center a,.w-full form label span{
                color: white;
                text-decoration: none;
            }
            .items-center a:hover{
                color: #362FD9;
            }
            .w-full form button[type="submit"]{
                background-color: #362FD9;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900"
            style="background-image: url(/storage/assets/images/TR_Wallpaper_2160p.jpg);
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;">
            <div>
                <a href="/" style="text-align: center!important; margin:auto;">
                    <img src="{{ asset('storage/uploads/company/'. \App\Models\CompanyDetail::orderby('id', 'desc')->first()->company_logo) }}" alt="Logo" 
                            class="w-30" style="text-align: center!important; margin:auto;">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" 
                style="backdrop-filter: blur(10px); background-color: rgb(0 20 64 / 33%);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
