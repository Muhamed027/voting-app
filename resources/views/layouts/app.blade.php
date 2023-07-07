<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forum</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <livewire:styles />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 max-w-7xl mx-auto text-gray-900 text-sm">
    <header class="flex items-center  justify-between px-8  py-2">
        <a href="#"> voting Logo</a>
        <div class="flex items-center">
            @if (Route::has('login'))
                <div class=" p-6 text-right">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-slate-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <a href="#">
                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar"
                    class="w-9 h-9 rounded-full">
            </a>
        </div>
    </header>
    <main class="container mx-auto flex" style="max-width:1000px">
        <div style="max-width:280px; margin-right:20px">
            <div class="border-2 bg-white border-blue-100 rounded-xl mt-16">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an idea</h3>
                    @auth
                        <p class="text-xs mt-4">let us know what you would like and we'll take a look over !</p>
                    @else
                        <p>please log in to create an idea </p>
                    @endauth
                </div>
                @auth
                    <livewire:create-idea />
                @else
                    <div class="my-28 text-center flex justify-between mx-2">
                        <a href="{{ route('login') }}"
                            class="flex items-center justify-center w-2/5 h-11 text-xs bg-gray-300 text-black font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-3 py-3">
                            log in
                        </a>
                        <a href="{{ route('register') }}"
                            class="flex items-center justify-center w-2/5 h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-3   py-3">
                            Sign Up
                        </a>
                    </div>
                @endauth

            </div>
        </div>
        <div style="max-width:700px">
            <livewire:status-filters />
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>
    <livewire:scripts />
    {{-- @push('scripts')
        <script>
            // Listen for the votesUpdated event and update the vote count
            Livewire.on('votesUpdated', votesCount => {
                document.querySelector('#votes-count').textContent = votesCount;
            });
        </script>
    @endpush --}}
</body>

</html>
