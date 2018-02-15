<?php

namespace CryptoPete\Frost\Adapter\Http;

interface HttpInterface
{
    /**
     * Perform GET request
     *
     * @param string $url   The request URL
     * @param string $token The API token
     *
     * @return string The request response
     */
    public function get(string $url, string $token): string;

    /**
     * POST Request
     *
     * @param string $url    The request url
     * @param string $token  The API token
     * @param bool   $verify Whether the verify the secure URL
     *
     * @return string The request response
     */
    public function post(string $url, string $token, array $params): string;
}
