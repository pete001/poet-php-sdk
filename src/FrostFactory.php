<?php

namespace CryptoPete\Frost;

use CryptoPete\Frost\Adapter\Http\GuzzleAdapter;
use CryptoPete\Frost\Adapter\Settings\DotenvAdapter;
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
     * Simple convenience factory
     *
     * @return FrostController
     */
    public function api(): FrostController
    {
        return new FrostController(
            new DotenvAdapter(new Dotenv(dirname(__DIR__))),
            new GuzzleAdapter(new Client)
        );
    }
}
