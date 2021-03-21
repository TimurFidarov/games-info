<div wire:init="loadPopularGames"  class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4
xl:grid-cols-6 gap-12
border-b
        border-gray-800
        pb-16">
    @forelse($popularGames as $game)
        <x-game-card :game="$game" />
    @empty
        @foreach(range(1,12) as $game)
            <div class="game mt-8">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-52 h-64 rounded"></div>
                </div>
            <div  class="inline-block text-transparent bg-gray-700 rounded text-lg leading-tight mt-4">
                game title goes here
            </div>
            <div class="text-transparent bg-gray-700 inline-block mt-3 leading-tight rounded">
                PC, PS4, Switch
            </div>
        </div>
        @endforeach
    @endforelse

    @push('scripts')
            @include('_rating', ['event' => 'gameWithRatingAdded'])
    @endpush
</div><!--  end popular games -->

