<div class="relative" x-data="{ isVisible: true }" @click.away="isVisible = false">
    <input
        wire:model.debounce.600ms="search"
        type="text"
        class="bg-gray-800 text-sm rounded-full
        px-3 py-1 pl-8 w-64 focus:outline-none focus:ring"
        placeholder="Search (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if (event.keyCode == 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @keydown = "isVisible = true"
        @keydown.escape.window="isVisible = false"
        @focus="isVisible = true"
        @keydown.shift.tab="isVisible=false"
    >
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>zoom-2</title>
            <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="#909090">
                <line fill="none" stroke-miterlimit="10" x1="22" y1="22" x2="16.4" y2="16.4"></line>
                <circle fill="none" stroke="#909090" stroke-miterlimit="10" cx="10" cy="10" r="9"></circle>
            </g></svg>
    </div>
    <div wire:loading class="absolute right-0 top-0 mr-3 mt-1.5">
        <svg class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50" style="border-right-color: white; border-top-color: white;" viewBox="0 0 24 24"></svg>
    </div>
    @if(strlen($search) >=2)
    <div class="absolute z-10 bg-gray-800 text-xs rounded w-64 mt-2" x-show.transition.opacity.duration.200="isVisible">
        @if(count($searchResults) > 0)
        <ul>
            @foreach($searchResults as $game)
                <li class="border-b border-gray-700">
                    <a href="{{route('games.show', $game['slug'])}}" class="block hover:bg-gray-700 flex item-center
                    transition
                    ease-in-out
                    duration
                    150 px-3
                    py-3"
                    @if($loop->last)@keydown.tab="isVisible=false" @endif>
                        @if(isset($game['cover']))
                            <img src="{{Str::replaceFirst('thumb','cover_small', $game['cover']['url'])}}" alt="cover"
                                 class="w-10">
                        @else
                            <img src="https://via.placeholder.com/90x120" alt="cover" class="w-10">
                        @endif
                        <span class="ml-4 ">{{$game['name']}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        @else
            <div class="px-3 py-3">
                No results for "{{$search}}"
            </div>
        @endif
    </div>
    @endif
</div>
