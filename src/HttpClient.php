<?php

namespace Sl;

use GuzzleHttp\Client as Guzzle;
use Psr\Http\Message\ResponseInterface;
use Sl\Contracts\HttpClient as HttpClientInterface;

class HttpClient extends Guzzle implements HttpClientInterface {
    /**
     * Create a new instance of HttpClient.
     *
     * @param string $baseUri
     */
    public function __construct($baseUri)
    {
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
     * Send HTTP request.
     *
     * @param  string $uri
     * @return array
     */
    public function sendRequest($uri)
    {
        $response = $this->request('GET', $uri);

        return $this->parseResponse($response);
    }

    /**
     * Parse response.
     *
     * @param  Psr\Http\Message\ResponseInterface $response
     * @return array
     */
    public function parseResponse(ResponseInterface $response)
    {
        $body = json_decode($response->getBody(), 1);

        return $body['data'];
    }
}
