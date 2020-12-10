<div class="inline-block relative search_field" x-data="{ open:true }">
        <input @click.away="{ open = false; @this.resetIndex(); }" @click="{ open = true }" type="text"
            class=" input focus:outline-none placeholder-cool-gray-500 "
            placeholder="Recherche"
            wire:model="query"
            wire:keydown.arrow-down.prevent="incrementIndex"
            wire:keydown.arrow-up.prevent="decrementIndex"
            wire:keydown.enter.prevent="showCourse"
            >

            <i class="fas fa-search"></i>

        @if (strlen($query) > 2)
        <div class="w-full p-2" x-show="open">
            @if (count($courses) > 0)
                @foreach ($courses as $index=>$course)
                <ul>
                    <li class="list-none bg-gray-200 border text-center">
                    <a href="{{route('course.show',[$course->id])}}" class="text-gray-400 text-md {{ $index === $selectedIndex ? 'text-green-500' : '' }}">{{$course->slug}}</a>
                    </li>
                </ul>

                @endforeach
            @else
            <span class="text-red-400">0 résultats pour "{{ $query }}"</span>
            @endif

        </div>
        @endif
</div>
