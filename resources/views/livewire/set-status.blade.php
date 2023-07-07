<div x-data="{ isOpen: false }" x-cloak class="relative" x-init="window.livewire.on('statusWasUpdated', () => { isOpen = false })">
    <button x-on:click="isOpen=!isOpen"  type="button"
        class="flex items-center space-x-4 justify-center h-11 w-36 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">

        <span class="ml-1">set status</span>
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>
    <div x-show="isOpen" x-transition.origin.top.left.duration.500ms
        class="absolute  z-10 w-96 text-left font-semibold text-sm bg-white shadow-xl rounded-xl mt-4">
        <form wire:submit.prevent="setStatus" class="space-y-4 py-6 mx-2">
            <div class="mt-2 space-y-2">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio text-gray-500 bg-gray-200" type="radio"
                            checked="" name="radio-direct" value="1">
                        <span class="ml-2">Open</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio text-purple-500 bg-gray-200" type="radio"
                            name="radio-direct" value="2">
                        <span class="ml-2">Considering</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio text-yellow-500 bg-gray-200" type="radio"
                            name="radio-direct" value="3">
                        <span class="ml-2">In progress</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio text-green-500 bg-gray-200" type="radio"
                            name="radio-direct" value="4">
                        <span class="ml-2">Implemented</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" class="form-radio text-red-500 bg-gray-200" type="radio"
                            name="radio-direct" value="5">
                        <span class="ml-2">Closed</span>
                    </label>
                </div>
            </div>
            <textarea name="update_comment" id="update_comment" cols="26" rows="3"
                class="w-full text-sm bg-gray-100 rounded-xl border-none px-4 py-2 placeholder-gray-600"
                placeholder="add an update commant (optional)..."></textarea>
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
                    class="flex items-center justify-center w-1/2 h-11 text-sm bg-blue-400 text-white font-semibold rounded-xl border transition duration-150 ease-in px-6 py-3">
                    <span class="ml-1">Update</span>
                </button>
            </div>
            <div class="inline-flex font-normal  text-sm items-center">
                <input wire:model="notifyAllVoters" type="checkbox" class="bg-gray-200 rounded-md" >
                <span class="ml-2">Notify all voters</span>
            </div>

        </form>
    </div>
</div>
