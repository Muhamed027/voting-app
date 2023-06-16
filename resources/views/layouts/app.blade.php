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
        <livewire:styles/>
        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/js/app.js'])
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
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-slate-500">Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                        </div>
                    @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-9 h-9 rounded-full">
                </a>
            </div>
       </header>
       <main class="container mx-auto flex" style="max-width:1000px">
            <div  style="max-width:280px; margin-right:20px">
                <div class="border-2 bg-white border-blue-100 rounded-xl mt-16">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add an idea</h3>
                        <p class="text-xs mt-4">let us know what you would like and  we'll  take a look over !</p>
                    </div>
                    <form action="#" method="POST" class="text-sm  py-6 px-4 space-y-4">
                        <div>
                            <input type="text" placeholder="Your Idea" class="w-full border-none bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2">
                        </div>
                        <div>
                            <select name="category_add" id="category_add" class="w-full bg-gray-100 rounded-xl border-none px-4 py-2">
                                <option value="Category One">Category One</option>
                                <option value="Category Two">Category Two</option>
                                <option value="Category Three">Category Three</option>
                                <option value="Category Four">Category Four</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="idea" id="idea" cols="26" rows="4" class="bg-gray-100 border-none placeholder-gray-800 text-sm px-4 py-2 rounded-xl" placeholder="descripe your idea"></textarea>
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button
                                type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                            >
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                            <button
                                type="submit"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                <span class="ml-1">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>      
        <div  style="max-width:700px">
            <nav class="flex items-center space-x-32 text-xs">
                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-7">
                    <li><a href="" class=" border-b-4 pb-3 border-blue-500">All Ideas (87)</a></li>
                    <li><a href="" class="transition border-b-4 pb-3 ease-in duration-150 hover:text-blue-600 hover:border-blue-600">considering (6)</a></li>
                    <li><a href="" class="transition border-b-4 pb-3 ease-in duration-150 hover:text-blue-600 hover:border-blue-600">In progress (1)</a></li>
                </ul>


                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-7">
                    <li><a href="" class="transition border-b-4 pb-3 ease-in duration-150 hover:text-blue-600 hover:border-blue-600">Implemented (10)</a></li>
                    <li><a href="" class="transition border-b-4 pb-3 ease-in duration-150 hover:text-blue-600 hover:border-blue-600">closed (55)</a></li>
                    
                </ul>
            </nav>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
       </main>
       <livewire:scripts/>
    </body>
</html>
