<form wire:submit.prevent="createIdea" action="#" method="POST" class="text-sm dark:text-white dark:bg-slate-800  py-6 px-4 space-y-4">
    <div>
        <input wire:model.defer="title" type="text" placeholder="Your Idea"
            class="w-full border-none bg-gray-100 dark:bg-slate-700 rounded-xl placeholder-gray-900 px-4 py-2" required>
    </div>
    @error('title')
        <p class="text-xs text-red-500 mt-4">{{ $message }}</p>
    @enderror
    <div>
        <select wire:model.defer="category" name="category_add" id="category_add" required
            class="w-full bg-gray-100 rounded-xl border-none px-4 py-2">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="text-xs text-red-500 mt-4">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <textarea wire:model.defer="description" name="idea" id="idea" cols="26" rows="4"
            class="bg-gray-100 dark:bg-slate-700 border-none placeholder-gray-800 text-sm px-4 py-2 rounded-xl" placeholder="descripe your idea"
            required></textarea>
        @error('description')
            <p class="text-xs text-red-500 mt-4">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center justify-between space-x-3 dark:bg-slate-700">
        <button type="button"
            class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
            <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>
            <span class="ml-1">Attach</span>
        </button>
        <button type="submit"
            class="flex items-center justify-center w-1/2 h-11 text-xs  bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
            <span class="ml-1">Submit</span>
        </button>
    </div>
    <div>

        @if (session()->has('success'))
            <div x-data="{ isVisible: true }" x-init="setTimeout(() => { isVisible = false }, 3000)" x-show.transition.duration.500ms="isVisible"
                class="text-green-500 text-center mt-4">

                {{ session('success') }}

            </div>
        @endif

    </div>
</form>
