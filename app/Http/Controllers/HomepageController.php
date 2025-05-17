<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\FilmService;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\map;

class HomepageController extends Controller
{
    private $FilmService;

    public function __construct(FilmService $film_service) {
        $this->FilmService = $film_service;
    }

    public function index()
    {
        $filmsNowPlaying = $this->FilmService->getFilmNowPlaying();
        // dd($filmsNowPlaying[0]['images']['logos']);
        if ($filmsNowPlaying) {
            return Inertia::render('Homepage', [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'filmsNowPlaying' => $filmsNowPlaying
            ]);
        }
        return response()->json([
            'error' => 'Something went wrong.'
        ], 400);
    }
}
