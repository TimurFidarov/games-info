<div class="coming-soon-container space-y-10 mt-8" wire:init="loadComingSoon">
    @forelse($comingSoon as $game)
        <div class="game flex">
            <a href="/games/{{ $game['slug'] }}">
                <img  src="{{ $game['coverImageUrl'] }}"
                      alt="game cover" class=" w-16 transition ease-in-out
                            duration-150">
            </a>
            <div class="ml-4">
                <a href="/games/{{ $game['slug'] }}">{{$game['name']}}</a>
                <div class="text-gray-400 text-sm mt-1">{{ $game['releaseDate'] }}</div>
            </div>
        </div>
        @empty
            @foreach(range(1,4) as $game)
                <div class="game flex">
                    <div class="w-16 h-20 bg-gray-700"></div>
                    <div class="ml-4">
                        <div class="text-transparent bg-gray-700 block rounded leading-tight">Game title</div>
                        <div class="mt-3 text-transparent bg-gray-700 inline-block text-sm rounded
                    leading-tight">September 14, 2021</div>
                    </div>
                </div>
            @endforeach
    @endforelse
</div>
