<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class TmdbResource extends Model
{
    private $api_key = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI4MDRiY2M3NzIxY2MzNDU4MWMzZWI2MzFiZTZjMzJmYyIsInN1YiI6IjY0ZmJiMzMwZGI0ZWQ2MTAzNDNkOWMwMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.cm-L2lIhWUqzsFtbz76RISzwPqIQXuIBjvoYACAaTwg';
    private $url = 'https://api.themoviedb.org/3/';
    private $request;
    private $appendToResponse;
    private $response;
    public $isFound = true;

    public function api(string $endpoint)
    {
        $this->request = $this->url . $endpoint;
        return $this;
    }
    public function path(string $path_param)
    {
        $this->request .= "/$path_param";
        return $this;
    }
    public function appendToResponse(string|array $append)
    {
        (is_array($append)) ? $append = implode(',', $append) : $append;
        $this->appendToResponse = "&append_to_response=$append";
        return $this;
    }
    public function getResponse()
    {
        $this->response = Http::withToken($this->api_key)
            ->acceptJson()
            ->get("{$this->request}?language=en-US{$this->appendToResponse}");

        if ($this->response->clientError() || $this->response->serverError()) {
            return $this->handleHttpResponse();
        }

        $this->response = collect($this->response->object());
        $this->response->put('isFound', true);
        return (object)$this->response->all();
    }

    private function handleHttpResponse()
    {
        if ($this->response->notFound()) {
            return view('errors.404', [
                'title' => 'Resource not found #' . $this->response->object()->status_code,
                'message'   => $this->response->object()->status_message . ' #' . $this->response->object()->status_code,
                'code'      => '404'
            ])->with('notfound', !$this->isFound);
        } elseif ($this->response->forbidden()) {
            return view('errors.403', [
                'title' => 'Forbidden #' . $this->response->object()->status_code,
                'message' => 'Forbidden #' . $this->response->object()->status_code,
                'code' => '403'
            ]);
        }
    }
}
