<?php

namespace Sl;

use GuzzleHttp\Client as Guzzle;
use Psr\Http\Message\ResponseInterface;
use Sl\Contracts\HttpClient as HttpClientInterface;

class HttpClient extends Guzzle implements HttpClientInterface {
    /**
     * Base uri.
     *
     * @var string
     */
    protected $baseUri;

    /**
     * Create a new instance of HttpClient.
     *
     * @param string $baseUri
     */
    public function __construct($baseUri)
    {
        $this->baseUri = $baseUri;

        parent::__construct([
            'base_uri' => $baseUri,
            'headers' => [
                'Accept' => 'application/json',
                'Accept-Encoding' => 'gzip, deflate, sdch',
                'Accept-Language' => 'en-US',
                'Host' => 'sl.se',
                'Referer' => 'http://sl.se/',
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36'
            ]
        ]);
    }

    /**
     * Get base uri.
     *
     * @return string
     */
    public function baseUri()
    {
        return $this->baseUri;
    }

     /**
     * Send HTTP GET request.
     *
     * @param string $uri
     * @return Psr\Http\Message\ResponseInterface
     */
    public function get($uri)
    {
        return $this->request('GET', $uri);
    }

    /**
     * Parse JSON response.
     *
     * @param  Psr\Http\Message\ResponseInterface $response
     * @return array
     */
    public function parseJsonResponse(ResponseInterface $response)
    {
        return json_decode($response->getBody(), 1);
    }

    /**
     * Send HTTP GET request and JSON response.
     *
     * @param string $uri
     * @return array
     */
    public function getAndParseJson($uri)
    {
        $response = $this->get($uri);

        return $this->parseJsonResponse($response);
    }
}
