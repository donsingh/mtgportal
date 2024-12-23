<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ًApplication</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <!-- Header and Menu Bar -->
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-semibold">MTG</h1>
            <nav class="space-x-6">
                <a href="/" class="hover:text-blue-300">Home</a>
                <a href="/sets" class="hover:text-blue-300">Sets</a>
                <!-- <a href="#" class="hover:text-blue-300">Services</a> -->
                <!-- <a href="#" class="hover:text-blue-300">Contact</a> -->
            </nav>
        </div>
    </header>
    <!-- <main class="container">
        <div id="app"></div>
    </main> -->
    <main class="container mx-auto mt-8 px-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div id="app"></div>
        </div>
    </main>

    @vite('resources/js/app.js')
</body>

</html>