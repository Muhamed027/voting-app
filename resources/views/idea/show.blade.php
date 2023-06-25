<x-app-layout>
    <div>
        <a href="{{ route('Idea.index') }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2"> All ideas</span>
        </a>
    </div>
    <livewire:idea-show :idea="$idea"  :votesCount="$votesCount" />


    <div class="comments-container relative">
        <div class="comment-container relative space-y-6 ml-24">
            <div class="  transition duration-150 ease-in bg-white mt-4 rounded-xl flex">

                <div class="flex px-5 py-6">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="mx-4">
                        {{-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">One more random title can go here</a>
                        </h4> --}}
                        <div class="text-gray-600 mt-3 ">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum possimus quasi reprehenderit
                            earum
                            incidunt. Ad reprehenderit repudiandae dolorem ducimus modi accusamus beatae perferendis?
                            Eum
                            eligendi nulla aliquam numquam! Nobis, tempore rerum autem accusamus perspiciatis laudantium
                            at
                            excepturi sint placeat nulla beatae qui aliquam quibusdam corrupti vel dolor praesentium
                            quam

                        </div>

                        <div x-data="{ isOpen: false }" class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-semibold text-gray-900">Jon Doe</div>
                                <div>10 hours ago</div>
                                <div>&bull;</div>

                            </div>
                            <div class="flex items-center space-x-2">
                                <button x-on:click="isOpen=!isOpen" x-on:click.away="isOpen=false" x-cloak
                                    class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>
                                    <ul x-show="isOpen" x-transition.origin.top.left.duration.500ms
                                        class=" absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark
                                                as Spam</a></li>
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete
                                                Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" is-admin relative comment-container space-y-6 ml-24">
            <div class="  transition duration-150 ease-in bg-white mt-4 rounded-xl flex">
                <div class="flex border-l-4 border-green-500  rounded-xl px-5 py-6">
                    <a href="#" class="flex-none">
                        <img src="{{ asset('./images/illustration-1.png') }}" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                        <div class="text-xs font-bold text-green-500 mt-1 text-center">ADMIN</div>
                    </a>
                    <div class="mx-4">
                        <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">Status changed to "under consedering" </a>
                        </h4>
                        <div class="text-gray-600 mt-3 ">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum possimus quasi reprehenderit
                            earum
                            incidunt. Ad reprehenderit repudianrupti vel dolor praesentium quam

                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-semibold text-green-500">memad</div>
                                <div>10 hours ago</div>
                                <div>&bull;</div>

                            </div>
                            <div class="flex items-center space-x-2">
                                <button
                                    class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>
                                    <ul
                                        class="hidden absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark
                                                as Spam</a></li>
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete
                                                Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
