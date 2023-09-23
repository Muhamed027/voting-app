<div x-data="{
    isOpen: false,
    scrollLastComment() {
        const commentContainer = this.$refs.commentContainer;
        commentContainer.scrollTop = commentContainer.scrollHeight;
      }
}" class="relative" x-cloak x-init="window.livewire.on('CommentWasAdded',
    () => {
        isOpen = false
    })">
    <button
        x-on:click="
    isOpen=!isOpen
        if(isOpen){
            $nextTick(()=>$refs.comment.focus())
        }
    "
        type="button"
        class="flex items-center justify-center w-32 h-11 text-sm bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
        <span class="ml-1">Reply</span>
    </button>
    <div x-show="isOpen" x-transition.origin.top.left.duration.500ms x-on:click.away="isOpen=false" x-cloak
        class="absolute  z-10 w-96 text-left font-semibold text-sm bg-white shadow-lg rounded-xl mt-4">
        @auth
            <form wire:submit.prevent="addComment" action="#" class="space-y-4 py-6 mx-2">
                <div>
                    <textarea wire:model="comment" x-ref="comment" name="post_comment" id="post_comment" cols="26" rows="4"
                        class="w-full text-sm bg-gray-100 border-none px-4 py-2 rounded-xl placeholder-gray-700"
                        placeholder="Go ahead, don't be shy. share your thoughts..." required></textarea>
                    @error('comment')
                        <p class="text-xs z-10 text-red-500 mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex space-x-8 ">
                    <button type="submit"
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
        @else
            <div class="px-4 py-6 space-y-2">
                <P class="font-normal"> please login or create an account to post a comment</P>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="bg-gray-300 px-4 py-2 rounded-lg">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-400 text-white px-4 py-2 rounded-lg">create a new
                        accout</a>
                </div>
            </div>
        @endauth
    </div>
</div>
