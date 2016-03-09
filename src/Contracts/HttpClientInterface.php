<?php

namespace Sl\Contracts;

use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{
    /**
     * Get base uri.
     *
     * @return string
     */
    public function baseUri();

    /**
     * Send HTTP GET request.
     *
     * @param string $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($uri);

    /**
     * Parse JSON response.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return array
     */
    public function parseJsonResponse(ResponseInterface $response);

    /**
     * Send HTTP GET request and JSON response.
     *
     * @param string $uri
     *
     * @return array
     */
    public function getAndParseJson($uri);
}
