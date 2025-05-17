<?php

namespace App\Http\Controllers;

use App\Services\FilmService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FilmController extends Controller
{
    //
    private $FilmService;
    public function __construct(FilmService $tmdb) {
        $this->FilmService = $tmdb;
    }

}
