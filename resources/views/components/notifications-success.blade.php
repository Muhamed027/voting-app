<div x-data="{
        isOpen: false,
        messageToDisplay: '',
        showNotification(message){
            this.isOpen = true
            this.messageToDisplay=message
            setTimeout(() => {
                this.isOpen = false
            }, 2000)
          }
        }"
    x-init="
        window.livewire.on('IdeaWasUpdated',message => {
            showNotification(message)   
            })
        window.livewire.on('IdeaWasMarkedAsASpam',message => {
            showNotification(message)
            })
        window.livewire.on('IdeaWasMarkedAsNotSpam',message => {
            showNotification(message)  
            })        
        window.livewire.on('CommentWasAdded',message => {
            showNotification(message)  
            })        
" >
    <button x-on:click="isOpen=!isOpen, 
    setTimeout(()=>{
        isOpen=false
 },5000)"></button>
    <div x-cloak x-show="isOpen" x-show="open" x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform translate-x-8 "
        x-transition:enter-end="opacity-100 transform translate-x-0 " x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform translate-x-8"
        class=" flex justify-between items-center fixed bottom-5 z-10 right-0 bg-white rounded-xl shadow-lg border px-6 py-5">
        <div class="flex items-center font-semibold text-gray-500 text-base mr-2">
            <svg class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            <span class="ml-2" x-text="messageToDisplay"></span>

        </div>
        <button x-on:click="isOpen=false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-blue-400">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>

    </div>
</div>
