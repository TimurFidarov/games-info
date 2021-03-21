<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders([
            'Client-ID' => env('Client_ID'),
            'Authorization' => 'Bearer ' . env('Auth_Key')
        ])->withBody(
            "fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug,
            involved_companies.company.name,genres.name,aggregated_rating, summary, websites.*, videos.*,screenshots.*,similar_games.cover.url,similar_games.name,
            similar_games.rating,similar_games.platforms.abbreviation,similar_games.slug;
                    where slug = \"{$slug}\";",
            'text/plain'
        )->post('https://api.igdb.com/v4/games')->json();
        if(!$game) abort(404);
        return view('show', ['game' => $this->formatGameForView($game[0])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function formatGameForView($game) {
        return collect($game)->merge([
            'coverImageUrl' => isset($game['cover']) ? Str::replaceFirst('thumb','cover_big', $game['cover']['url'])
                : 'https://via.placeholder.com/264x352',
            'genres' => collect($game['genres'])->pluck('name')->implode(', '),
            'companies' => isset($game['involved_companies']) ? collect($game['involved_companies'])->pluck
            ('company')->pluck('name')->implode(', ') : 'unknown',
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            'mRating' => isset($game['rating']) ? round($game['rating']) : '0',
            'cRating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating']) . '' : '0',
            'trailer' => isset($game['videos'][0]) ?  'https://youtube.com/watch/'.$game['videos'][0]['video_id']:null,
            'screenshots' => collect($game['screenshots'])->take(9)->map(function ($screenshot) {
                return [
                    'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                    'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                ];
            }),
            'similarGames' => collect($game['similar_games'])->take(6)->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big',
                        $game['cover']['url']) :
                        'https://via.placeholder.com/264x352',
                    'rating' => isset($game['rating']) ? round($game['rating']) : null,
                    'platforms' => array_key_exists('platforms', $game) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : null,
                ]);
            }),
            'social' => [
                'website' => collect($game['websites'])->first(),
                'facebook' => collect($game['websites'])->filter(function($website) {
                    return Str::contains($website['url'], 'facebook');
                })->first(),
                'twitter' => collect($game['websites'])->filter(function($website) {
                    return Str::contains($website['url'], 'twitter');
                })->first(),
                'instagram' => collect($game['websites'])->filter(function($website) {
                    return Str::contains($website['url'], 'instagram');
                })->first(),
            ]
        ]);
    }
}
