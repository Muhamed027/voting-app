<div class="idea and button dark:text-white dark:bg-slate-900 container">

    <div
        class="idea-container dark:text-white dark:bg-slate-900  transition duration-150 ease-in bg-white mt-4 rounded-xl flex">

        <div class="flex px-5 py-6">
            <a href="#" class="flex-none">
                <img src="{{ $idea->author->avatar }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
            <div class="mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3 ">
                    @admin
                        @if ($idea->spam_reports > 0)
                            <div class="text-xs text-red-500 mb-2">Spam Reports : {{ $idea->spam_reports }}</div>
                        @endif
                    @endadmin
                    {{ $idea->description }}
                </div>

                <div class="flex items-center justify-between  mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-semibold text-gray-900">{{ $idea->author->name }}</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">{{ $idea->comments()->count()  }} Comments</div>
                    </div>
                    <div x-data="{ isOpen: false }" class="flex items-center  space-x-2" x-cloak>
                        <div
                            class=" {{ $idea->status->classes }}bg-green-400 text-white text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}</div>
                        @auth
                            <div class="relative">
                                <button x-on:click="isOpen=!isOpen" x-on:click.away="isOpen=false" x-cloak
                                    class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6">
                                        <path
                                            d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)">
                                    </svg>
                                </button>
                                @auth
                                    <ul x-show="isOpen" x-transition.origin.top.left.duration.500ms
                                        class=" absolute z-20 w-44 display-none  text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                        @can('update', $idea)
                                            <li>
                                                <a href="#"
                                                    @click.prevent="
                                                    isOpen='false'
                                                    $dispatch('custom-show-edit-idea-modal')"
                                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">
                                                    edit Idea
                                                </a>
                                            </li>
                                        @endcan
                                        @can('delete', $idea)
                                            <li>
                                                <a href="#"
                                                    @click.prevent="
                                                    isOpen='false'
                                                    $dispatch('custom-show-delete-idea-modal')"
                                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Delete
                                                    Idea
                                                </a>
                                            </li>
                                        @endcan
                                        <li>
                                            <a href="#"
                                                @click.prevent="
                                                    isOpen='false'
                                                    $dispatch('custom-show-mark-as-a-spam-idea-modal')"
                                                class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Mark
                                                as Spam
                                            </a>
                                        </li>
                                        @admin
                                            <li>
                                                <a href="#"
                                                    @click.prevent="
                                                isOpen='false'
                                                $dispatch('custom-show-mark-as-not-spam-idea-modal')"
                                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Mark
                                                    As Not Spam
                                                </a>
                                            </li>
                                        @endadmin

                                    </ul>
                                @endauth
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end iead container -->
    <div class="button-container flex items-center justify-between mt-6">
        <div class="flex items-center space-x-4 ml-6">
           <livewire:add-comment :idea="$idea" />
            @admin
                <livewire:set-status :idea="$idea" />
            @endadmin
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
