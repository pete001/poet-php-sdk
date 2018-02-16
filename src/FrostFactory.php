<?php

namespace CryptoPete\Frost;

use CryptoPete\Frost\Adapter\Http\GuzzleAdapter;
use CryptoPete\Frost\Adapter\Http\HttpInterface;
use CryptoPete\Frost\Adapter\Settings\DotenvAdapter;
use CryptoPete\Frost\Adapter\Settings\SettingsInterface;
use Dotenv\Dotenv;
use GuzzleHttp\Client;

/**
 * Class FrostFactory
 *
 * Simple factory methods to help speed up integration
 */
class FrostFactory
{
    /**
     * Simple convenience factory which can be overloaded or used with defaults
     *
     * @param string                 $env
     * @param SettingsInterface|null $settings
     * @param HttpInterface|null     $http
     *
     * @return FrostController
     */
    public function api(string $env = '.env', SettingsInterface $settings = null, HttpInterface $http = null): FrostController
    {
        $settings = $settings ?? new DotenvAdapter(new Dotenv(dirname(__DIR__), $env));
        $http = $http ?? new GuzzleAdapter(new Client);

        return new FrostController(
            $settings,
            $http
        );
    }
}
