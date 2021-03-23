<!doctype html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Video Games</title>
    <livewire:styles />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex items-center flex-col lg:flex-row">
                <a href="/" style="flex-shrink: 1;">
                    <img src="/logo.svg" alt="logo" class="w-32 flex-none">
                </a>
                <ul class="flex lg:ml-16 space-x-8 mt-6 lg:mt-0">
                    <li><a href="/" class="hover:text-gray-400">Games</a></li>
                    <li><a href="/#recently-reviewed" class="hover:text-gray-400"
                           onclick="document.getElementById('recently-reviewed').scrollIntoView()">Reviews</a></li>
                    <li><a href="/#coming-soon" class="hover:text-gray-400" onclick="document.getElementById('recently-reviewed').scrollIntoView()">Coming soon</a></li>
                </ul>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                <livewire:search-dropdown />
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>


    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered By <a href="https://www.igdb.com/api" class="underline hover:text-gray-400">IGDB API</a>
        </div>
    </footer>
    <livewire:scripts />
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>
