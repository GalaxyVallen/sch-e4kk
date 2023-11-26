<?php

namespace App\Http\Controllers;

use App\Models\TmdbResource;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public $tmdb;

    public function __construct()
    {
        $this->tmdb = new TmdbResource();
    }

    public function index()
    {
        $trending = $this->tmdb->api('trending')->path('all/week')->getResponse();
        $nowPlayMovie = $this->tmdb->api('movie')->path('now_playing')->getResponse();
        $randImg = $this->getRandBackDrop($nowPlayMovie);

        return view('test', compact('trending', 'randImg', 'nowPlayMovie'));
    }

    public function getRandBackDrop(object|array $data): ?string
    {
        if ($data && isset($data->results) && count($data->results) > 0) {
            $randIndex = array_rand($data->results, 1);
            $backdropPath = $data->results[$randIndex]->backdrop_path;
            return $backdropPath;
        } else {
            return null;
        }
    }
}
