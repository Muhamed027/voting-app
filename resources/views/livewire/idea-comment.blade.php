<div>
    <div class="comment-container relative space-y-6 ml-24" x-ref="commentContainer">
        <div class="  transition duration-150 ease-in bg-white mt-4 rounded-xl flex">
    
            <div class="flex px-5 py-6">
                <a href="#" class="flex-none">
                    <img src="{{ $comment->author->avatar  }}" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">One more random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3 ">
                        {{ $comment->body }}
                    </div>
                   
    
                    <div x-data="{ isOpen: false }" class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-semibold text-gray-900">{{ $comment->author->name }}</div>
                            <div class="mx-2">&bull;</div>
                           {{-- @if ()
                           {{-- <div class="rounded-full border bg-gray-200 p-2">OP</div>
                           <div class="mx-2">&bull;</div> --}}
                          {{-- @endif --}}
                            <div>{{ $comment->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="flex items-center space-x-2" x-cloak>
                            <button x-on:click="isOpen=!isOpen" x-on:click.away="isOpen=false" x-clock
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul x-show="isOpen" x-transition.origin.top.left.duration.500ms
                                    class=" absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                    <li>
                                        <a href="#"
                                            class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark
                                            edit Idea
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete
                                            Post
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark
                                            as Spam
                                        </a>
                                    </li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>