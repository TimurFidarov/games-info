<div class="coming-soon-container space-y-10 mt-8" wire:init="loadComingSoon">
    @forelse($comingSoon as $game)
        <x-game-card-small :game="$game" />
        @empty
            @foreach(range(1,4) as $game)
                <x-game-card-small-skeleton />
            @endforeach
    @endforelse
</div>
