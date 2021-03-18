<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class MostAnticipatedGames extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated(){


        $unformattedMostAnticipated = Cache::remember('most-anticipated', 30, function () {
            $after = Carbon::now()->addMonths(2)->timestamp;
            $current = Carbon::now()->timestamp;
            return  Http::withHeaders([
                'Client-ID' => env('Client_ID'),
                'Authorization' => 'Bearer ' . env('Auth_Key')
            ])->withBody(
                "fields name, cover.url, first_release_date, hypes, platforms.abbreviation, summary, slug;
                    where platforms = (48,49,130,6)
                        & (first_release_date >= {$current}
                        & first_release_date < {$after}
                        & hypes > 5);
                    sort hypes desc;
                    limit 4;",'text/plain'
            )->post('https://api.igdb.com/v4/games')->json();
        });

        $this->mostAnticipated = $this->formatForView($unformattedMostAnticipated);


    }

    public function render()
    {
        return view('livewire.most-anticipated-games');
    }

    private function formatForView($games) {
        return collect($games)->map(function($game) {
            return collect($game)->merge([
                'coverImageUrl' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_small',
                    $game['cover']['url']) :
                    'https://via.placeholder.com/90x120',
                'releaseDate' => Carbon::parse($game['first_release_date'])->format('M d, Y'),
            ]);
        });
    }
}
