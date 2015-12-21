<?php

use Sl\HttpClient;
use Psr\Http\Message\ResponseInterface;

class HttpClientTest extends PHPUnit_Framework_TestCase {
    protected $httpClient;

    protected $jsonUri;

    function setUp()
    {
        $this->httpClient = new HttpClient('http://www.mocky.io/v2/');

        $this->jsonUri = '5678638b0f00006a2a500861';
    }

    /** @test */
    function http_client_has_base_uri()
    {
        $this->assertEquals('http://www.mocky.io/v2/', $this->httpClient->baseUri());
    }

    /** @test */
    function http_client_can_send_get_request()
    {
        $response = $this->httpClient->get($this->jsonUri);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    /** @test */
    function http_client_can_send_get_request_and_parse_json_response()
    {
        $data = $this->httpClient->getAndParseJson($this->jsonUri);

        $this->assertEquals(['foo' => 'bar', 'baz' => 123], $data);
    }
}
