<?php

namespace App\Http\Controllers;

use App\Models\TmdbResource;
use App\Traits\MovieLib;
use Illuminate\Support\Facades\Cache;

class MovieController extends Controller
{
    use MovieLib;

    public $tmdb;

    public function __construct()
    {
        $this->tmdb = new TmdbResource();
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $cache = Cache::get("movie-$id");

        $movie = $this->tmdb->api('movie')->path($id)->appendToResponse(['videos', 'credits'])->getResponse();
        if (isset($movie->runtime)) {
            $movie->runtime = $this->formatRuntime($movie->runtime);
        }
        $key = "movie-$id";

        if (!$movie->isFound && $movie->getData()['code'] == '404') {
            $view = $movie->getName();
            $movie = $movie->getData();
        } else {
            $view = 'movie';
            Cache::put($key, $movie, now()->addHour());
        }
        return view($view, compact('movie'));
    }
}
