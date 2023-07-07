<div class="idea-container hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
    <div class="border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if ($hasVoted) text-blue-500 @endif">
                {{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
            @if ($hasVoted)
                <button wire:click.prevent="vote"
                    class="w-20 bg-blue-500 border text-white border-gray-200 hover:border-blue-400 font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">
                    <span>voted</span>
                </button>
            @else
                <button wire:click.prevent="vote" 
                    class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">
                    <span>vote</span>
                </button>
            @endif
        </div>
    </div>
    <div class="flex flex-1 px-2 py-6">
        <a href="#" class="flex-none">
            <img src="{{ $idea->author->avatar }}" alt="avatar" class="w-14 h-14 rounded-xl">
        </a>
        <div class="mx-4 flex flex-col justify-between w-full">
            <h4 class="text-xl font-semibold">
                <a href="{{ route('Idea.show', $idea) }}" class="idea-link hover:underline">
                    {{ $idea->title }}</a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{ $idea->description }}
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div>{{ $idea->created_at->diffForhumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Comments</div>
                </div>
                <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                    <div
                        class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-40 h-7 py-2 px-4">
                        {{ $idea->status->name }}</div>

                </div>
            </div>
        </div>
    </div>
</div> <!-- end idea-container -->
