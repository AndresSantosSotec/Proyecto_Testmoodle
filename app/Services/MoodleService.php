<?php
namespace App\Services;

use GuzzleHttp\Client;

class MoodleService
{
    protected Client $http;
    protected string $baseUrl;
    protected string $token;
    protected string $format;

    public function __construct()
    {
        $this->http    = new Client();
        $this->baseUrl = config('app.moodle_base_url', env('MOODLE_BASE_URL'));
        $this->token   = env('MOODLE_TOKEN');
        $this->format  = env('MOODLE_FORMAT', 'json');
    }

    /**
     * Llama a cualquier función WS de Moodle pasándole nombre y parámetros.
     */
    public function call(string $functionName, array $params = [])
    {
        $query = array_merge($params, [
            'wstoken'           => $this->token,
            'wsfunction'        => $functionName,
            'moodlewsrestformat'=> $this->format,
        ]);

        $response = $this->http->get($this->baseUrl, ['query' => $query]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
