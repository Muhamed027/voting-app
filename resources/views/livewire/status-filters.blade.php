<nav class="flex items-center space-x-32 text-gray-500 text-xs">
    <ul class="flex uppercase font-semibold border-b-4 pb-3  space-x-3">
        <li>
            <a wire:click.prevent="setStatus('All')" href="{{ route('Idea.index',['status'=>'All']) }}"
                class=" border-b-4 pb-3 ease-in duration-150 @if ($status === 'All') text-gray-900 border-blue-600 @endif ">All
                Ideas
                @if (!($status_count['all_status']))
                    (+99)
                @else
                    ({{ $status_count['all_status'] }})
                @endif
            </a>
        </li>
        <li>
            <a wire:click.prevent="setStatus('considering')" href="{{ route('Idea.index',['status'=>'considering']) }}"
                class="transition border-b-4 pb-3 ease-in duration-150 @if ($status === 'considering') text-gray-900 border-purple-600 @endif hover:text-purple-600 hover:border-purple-600">considering
                @if (!$status_count['considering'])
                    (+99)
                @else
                    ({{ $status_count['considering'] }})
                @endif
            </a>
        </li>
        <li>
            <a wire:click.prevent="setStatus('in progress')" href="{{ route('Idea.index',['status'=>'in progress']) }}"
                class="transition border-b-4 pb-3 ease-in duration-150 @if ($status === 'in progress') text-gray-900 border-yellow-600 @endif hover:text-yellow-600 hover:border-yellow-600">In
                progress
                @if (!$status_count['in_progress'])
                    (+99)
                @else
                    ({{ $status_count['in_progress'] }})
                @endif
            </a>
        </li>
    </ul>


    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-3">
        <li><a wire:click.prevent="setStatus('implemented')" href="{{ route('Idea.index',['status'=>'implemented']) }}"
                class="transition border-b-4 pb-3 ease-in duration-150 @if ($status === 'implemented') text-gray-900 border-green-600 @endif hover:text-green-600 hover:border-green-600">Implemented
                @if (!$status_count['implemented'])
                    (+99)
                @else
                    ({{ $status_count['implemented'] }})
                @endif
            </a></li>
        <li><a wire:click.prevent="setStatus('closed')" href="{{ route('Idea.index',['status'=>'closed']) }}"
                class="transition border-b-4 pb-3 ease-in duration-150 @if ($status === 'closed') text-gray-900 border-red-600 @endif hover:text-red-600 hover:border-red-600">closed
                @if (!  $status_count['closed'])
                    (+99)
                @else
                    ({{ $status_count['closed'] }})
                @endif
            </a></li>

    </ul>
</nav>
