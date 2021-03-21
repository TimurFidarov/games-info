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
</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex items-center flex-col lg:flex-row">
                <a href="/" style="flex-shrink: 1;">
                    <img src="/logo.svg" alt="logo" class="w-32 flex-none">
                </a>
                <ul class="flex lg:ml-16 space-x-8 mt-6 lg:mt-0">
                    <li><a href="#" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#" class="hover:text-gray-400">Coming soon</a></li>
                </ul>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                <div class="relative">
                    <input type="text" class="bg-gray-800 text-sm rounded-full px-3 py-1 pl-8 w-64 focus:outline-none focus:ring" placeholder="Search...">
                    <div class="absolute top-0 flex items-center h-full ml-2">
                        <svg class="fill-current text-gray-400 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>zoom-2</title>
                            <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" fill="" stroke="#909090">
                                <line fill="none" stroke-miterlimit="10" x1="22" y1="22" x2="16.4" y2="16.4"></line>
                                <circle fill="none" stroke="#909090" stroke-miterlimit="10" cx="10" cy="10" r="9"></circle>
                            </g></svg>
                    </div>
                </div>

                <div class="ml-6">
                    <a href="#"><img src="/avatar.svg" alt="avatar" class="rounded-full w-8"></a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>


    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered By <a href="" class="underline hover:text-gray-400">IGDB API</a>
        </div>
    </footer>
    <livewire:scripts />
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>
