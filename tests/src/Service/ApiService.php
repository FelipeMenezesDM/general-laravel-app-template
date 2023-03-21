<?php

namespace Src\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Src\Props\Props;

class ApiService
{
    private static ApiService|null $instance = null;
    private static string|null $apiUrl = null;
    private static string|null $correlationId = null;

    public static function getInstance() : ApiService
    {
        if(is_null(self::$instance)) {
            self::$apiUrl = Props::getProperty('api.url');
            self::$correlationId = Props::getProperty('api.correlation-id');
            self::$instance = new static;
        }

        return self::$instance;
    }

    public function get(string $uri, array|null $headers, array|null $variables) : ResponseInterface
    {
        return $this->sendRequest('GET', $uri, null, $headers, $variables);
    }

    public function post(string $uri, array|null $body, array|null $headers, array|null $variables) : ResponseInterface
    {
        return $this->sendRequest('POST', $uri, $body, $headers, $variables);
    }

    public function put(string $uri, array|null $body, array|null $headers, array|null $variables) : ResponseInterface
    {
        return $this->sendRequest('PUT', $uri, $body, $headers, $variables);
    }

    public function patch(string $uri, array|null $body, array|null $headers, array|null $variables) : ResponseInterface
    {
        return $this->sendRequest('PATCH', $uri, $body, $headers, $variables);
    }

    public function delete(string $uri, array|null $headers, array|null $variables) : ResponseInterface
    {
        return $this->sendRequest('DELETE', $uri, null, $headers, $variables);
    }

    /**
     * @throws GuzzleException
     */
    private function sendRequest(string $method, string $uri, array|null $body, array|null $headers, array|null $variables) : ResponseInterface
    {
        return (new Client())->request($method, $this->handleUrl(self::$apiUrl . $uri, $variables), [
            'json'      => $body ?? [],
            'headers'   => $this->handleHeaders($headers),
        ]);
    }

    private function handleHeaders(array|null $headers) : array
    {
        $headers = $headers ?? [];

        if(array_key_exists('Authorization', $headers)) {
            $headers['Authorization'] = '';
        }

        if(array_key_exists('CorrelationId', $headers)) {
            $headers['CorrelationId'] = self::$correlationId;
        }

        return $headers;
    }

    private function handleUrl(string $url, array|null $params) : string
    {
        if(!$params) {
            return $url;
        }

        array_walk($params, function($v, $k) use (&$url) {
            $url = str_replace('{'.$k.'}', $v, $url);
        });

        return $url;
    }
}
