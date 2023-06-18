<form action="#" method="POST" class="text-sm  py-6 px-4 space-y-4">
    <div>
        <input type="text" placeholder="Your Idea"
            class="w-full border-none bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2">
    </div>
    <div>
        <select name="category_add" id="category_add"
            class="w-full bg-gray-100 rounded-xl border-none px-4 py-2">
            <option value="Category One">Category One</option>
            <option value="Category Two">Category Two</option>
            <option value="Category Three">Category Three</option>
            <option value="Category Four">Category Four</option>
        </select>
    </div>
    <div>
        <textarea name="idea" id="idea" cols="26" rows="4"
            class="bg-gray-100 border-none placeholder-gray-800 text-sm px-4 py-2 rounded-xl" placeholder="descripe your idea"></textarea>
    </div>
    <div class="flex items-center justify-between space-x-3">
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
            class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
            <span class="ml-1">Submit</span>
        </button>
    </div>
</form>