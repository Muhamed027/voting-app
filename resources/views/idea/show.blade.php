<x-app-layout>
    <div class="dark:text-white dark:bg-slate-900">
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2"> All ideas(Or back to chosen category with filters )</span>
        </a>
    </div>
    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />

    <x-notifications-success />
    <x-ideas-modals-container :idea="$idea" />


    <livewire:idea-comments :idea="$idea" />
</x-app-layout>
