<x-mail::message>
    # idea status updated

    The Idea:{{ $idea->title }}

    <x-mail::button :url="$url">
        View Idea
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
