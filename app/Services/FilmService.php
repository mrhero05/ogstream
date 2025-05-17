<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class FilmService
{
    protected $client;

    public function __construct() {
        $this->client = Http::baseUrl('https://api.themoviedb.org/3')->withToken(env('TMDB_API_KEY'));
    }

    public function get($endpoint, $params = [])
    {
        return $this->client->get($endpoint, $params)->json();
    }

    public function getFilmNowPlaying()
    {
        try {
            // Call api for Now Playing films
            $data = $this->get('movie/now_playing', [
                'language' => 'en-US',
                'page' => 1
            ]);
            $limitData = array_slice($data['results'], 0, 5);

            // Add new key value pair on array of Films
            foreach ($limitData as $key => $image) {
                $limitData[$key]['images'] = $this->getFilmImages($limitData[$key]['id']);
            }

            return $limitData;
        } catch (\Throwable $th) {
            return false;
        }
    }

    // Get all film Images based on filmID
    public function getFilmImages($filmID)
    {
        try {
            $data = $this->get('movie/'.$filmID.'/images', [
                'language' => 'en'
            ]);
            return $data;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
