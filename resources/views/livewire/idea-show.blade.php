<div class="idea and button container">

    <div class="idea-container  transition duration-150 ease-in bg-white mt-4 rounded-xl flex">

        <div class="flex px-5 py-6">
            <a href="#" class="flex-none">
                <img src="{{ $idea->author->avatar }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
            <div class="mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3 ">
                    {{ $idea->description }}
                </div>

                <div class="flex items-center justify-between  mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-semibold text-gray-900">{{ $idea->author->name }}</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>
                    <div x-data="{ isOpen: false }" class="flex items-center  space-x-2" x-cloak>
                        <div
                            class=" {{ $idea->status->classes }}bg-green-400 text-white text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}</div>
                        <div class="relative">
                            <button x-on:click="isOpen=!isOpen" x-on:click.away="isOpen=false" x-cloak
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path
                                        d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                        style="color: rgba(163, 163, 163, .5)">
                                </svg>
                            </button>
                            <ul x-show="isOpen" x-transition.origin.top.left.duration.500ms
                                class=" absolute w-44 display-none  text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                <li>
                                    <a href="#" @click="$dispatch('custom-show-edit-idea-modal')"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">
                                        edit Idea
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Delete
                                        Idea
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Mark
                                        as Spam
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end iead container -->
    <div class="button-container flex items-center justify-between mt-6">
        <div class="flex items-center space-x-4 ml-6">
            <div x-data="{ isOpen: false }" class="relative" x-cloak>
                <button x-on:click="isOpen=!isOpen" x-on:click.away="isOpen=false"  type="button"
                    class="flex items-center justify-center w-32 h-11 text-sm bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                    <span class="ml-1">Reply</span>
                </button>
                <div x-show="isOpen" x-transition.origin.top.left.duration.500ms
                    class="absolute  z-10 w-96 text-left font-semibold text-sm bg-white shadow-lg rounded-xl mt-4">
                    <form action="#" class="space-y-4 py-6 mx-2">
                        <div>
                            <textarea name="" id="" cols="26" rows="4"
                                class="w-full text-sm bg-gray-100 border-none px-4 py-2 rounded-xl placeholder-gray-700"
                                placeholder="Go ahead, don't be shy. share your thoughts..."></textarea>
                        </div>
                        <div class="flex space-x-8 ">
                            <button type="button"
                                class="flex items-center justify-center  h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl transition duration-150 ease-in px-6  mx-3">
                                <span class="ml-1">Post comment</span>
                            </button>
                            <button type="button"
                                class="flex items-center justify-center h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @auth
                @if (Auth::user()->isAdmin())
                    <livewire:set-status :idea="$idea" />
                @endif
            @endauth

        </div>
        <div class="flex items-center space-x-3">
            <div class="bg-white text-gray-600 font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if ($hasVoted) text-blue-500 @endif">
                    {{ $votesCount }}</div>
                <div class="text-xs text-gray-400 leading-none">VOTES</div>
            </div>
            @if ($hasVoted)
                <button type="button" wire:click="vote"
                    class=" space-x-4 justify-center uppercase h-11 w-32 text-xs bg-blue-500 font-semibold rounded-xl border border-gray-200 hover:border-blue-600 transition duration-150 ease-in px-6 py-3">
                    <span class="ml-1 text-white">VOTED</span>
                </button>
            @else
                <button type="button" wire:click="vote"
                    class=" space-x-4 justify-center uppercase h-11 w-32 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                    <span class="ml-1">VOTE</span>
                </button>
            @endif
        </div>
    </div>
    <!--end button container-->
</div>
