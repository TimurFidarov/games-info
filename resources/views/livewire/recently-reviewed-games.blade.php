<div class="recently-reviewed-container space-y-12 mt-8" wire:init="loadRecentlyReviewed">
    @forelse($recentlyReviewed as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="#">
                    <img  src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}"
                          alt="game cover">

                </a>
                @if(isset($game['rating']))
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right:
                                -20px;
                        bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{ round($game['rating']) . '%' }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="ml-12">
                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                    {{$game['name']}}

                </a>
                <div class="text-gray-400 mt-1">
                    @foreach($game['platforms'] as $platform)
                        @if(array_key_exists('abbreviation', $platform))
                            {{$platform['abbreviation'] . ','}}
                        @endif
                    @endforeach
                </div>
                <p class="mt-6 text-gray-400 hidden xl:block">
                    {{$game['summary']}}
                </p>
            </div>
        </div>
    @empty
        @foreach(range(1,4) as $game)
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none">
                    <div class="bg-gray-700 w-32 lg:w-48 xl:w-56 h-44 lg:h-56 xl:h-64 rounded"></div>
                </div>
                <div class="ml-12">
                    <div class="inline-block text-transparent bg-gray-700 text-lg rounded leading-tight mt-4">
                        Title goes here
                    </div>
                    <div class="mt-10 space-y-4 hidden xl:block">
                        <div class="text-transparent inline-block bg-gray-700 rounded">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur.
                        </div>
                        <div class="text-transparent inline-block bg-gray-700 rounded">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur.
                        </div>
                        <div class="text-transparent inline-block bg-gray-700 rounded">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur.
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforelse

</div>
