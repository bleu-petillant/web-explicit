<div class="inline-block relative" x-data="{ open:true }">
        <input @click.away="{ open = false; @this.resetIndex(); }" @click="{ open = true }" type="text"
            class=" bg-gray-200 border-2 text-cool-gray-700 focus:outline-none placeholder-cool-gray-500 px-2 py-1 rounded-full mr-2"
            placeholder="rechercher un cours...."
            wire:model="query"
            wire:keydown.arrow-down.prevent="incrementIndex"
            wire:keydown.arrow-up.prevent="decrementIndex"
            wire:keydown.enter.prevent="showCourse"
            >

        <svg class="w-6 h-6 absolute top-0 right-0 mr-5 mt-2 text-cool-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>

        @if (strlen($query) > 2)
        <div class="w-full p-2" x-show="open">
            @if (count($courses) > 0)
                @foreach ($courses as $index=>$course)
                <ul>
                    <li class="list-none bg-gray-200 border text-center">
                        <a href="#!" class="text-gray-400 text-md {{ $index === $selectedIndex ? 'text-green-500' : '' }}">{{$course->title}}</a>
                    </li>
                </ul>

                @endforeach
            @else
            <span class="text-red-400">0 résultats pour "{{ $query }}"</span>
            @endif

        </div>
        @endif
</div>
