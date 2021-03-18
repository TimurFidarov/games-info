<div class="game flex">
    <a href="/games/{{ $game['slug'] }}">
        <img  src="{{  $game['coverImageUrl']}}"
              alt="game cover" class=" w-16 transition ease-in-out
                            duration-150">
    </a>
    <div class="ml-4">
        <a href="/games/{{ $game['slug'] }}">{{$game['name']}}</a>
        <div class="text-gray-400 text-sm mt-1">{{$game['releaseDate']}}</div>
    </div>
</div>
