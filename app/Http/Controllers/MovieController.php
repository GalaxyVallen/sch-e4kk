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
        $movie = Cache::get("movie-$id");
        if ($movie === null) {
            $movie = $this->tmdb->api('movie')->path($id)->appendToResponse(['videos', 'credits'])->getResponse();
            if (isset($movie->runtime)) {
                $movie->runtime = $this->formatRuntime($movie->runtime);
            }
            Cache::put("movie-$id", $movie, now()->addHour());
        }
        if (!empty($movie)) {
            if (!$movie->isFound && $movie->getData()['code'] == '404') {
                $view = $movie->getName();
                $movie = $movie->getData();
            } else {
                $view = 'movie';
            }
            return view($view, compact('movie'));
        }
    }
}
