@if ($comments->isNotEmpty())
    <div class="comments-container relative dark:text-white dark:bg-slate-900">
        @foreach ($comments as $comment)
            <livewire:idea-comment :key="$comment->id" :comment="$comment" />
        @endforeach
    </div>
   
@else
    <div class="mx-auto w-64 h-[300px] mt-12">
        <img src="{{ asset('images/javascript-techniques-for-server-side-developers (1).png') }}" alt=""
            class="flex items-center justify-center w-36 mix-blend-luminosity mx-auto">
        <div class="text-gray-400 text-center font-semibold">No comment found yet ...<span class="text-blue-500 underline">add one </span> </div>
    </div>
@endif
<div class="my-8">
    {{ $comments->links() }}
</div>