<?php

namespace Sl\Contracts;

use Psr\Http\Message\ResponseInterface;

interface HttpClient {
    /**
     * Send HTTP request.
     *
     * @param  string $uri
     * @return array
     */
    public function sendRequest($url);

    /**
     * Parse response.
     *
     * @param  Psr\Http\Message\ResponseInterface $response
     * @return array
     */
    public function parseResponse(ResponseInterface $response);
}
