<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoonGames extends Component
{
    public $comingSoon = [];

    public function loadComingSoon(){
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;


        $this->comingSoon = Cache::remember('coming-soon', 30, function () {
            $after = Carbon::now()->addMonths(2)->timestamp;
            $current = Carbon::now()->timestamp;
            return Http::withHeaders([
                'Client-ID' => env('Client_ID'),
                'Authorization' => 'Bearer ' . env('Auth_Key')
            ])->withBody(
                "fields name, cover.url, first_release_date, hypes, platforms.abbreviation, summary, slug;
                    where platforms = (48,49,130,6)
                        & (first_release_date >= {$current}
                        & first_release_date < {$after}
                        & hypes > 5);
                    sort first_release_date asc;
                    limit 3;", 'text/plain'
            )->post('https://api.igdb.com/v4/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.coming-soon-games');
    }
}
