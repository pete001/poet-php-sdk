<?php

namespace CryptoPete\Frost\Adapter\Settings;

use Dotenv\Dotenv;

/**
 * Class DotenvAdapter
 *
 * The dotenv adaptor for loading settings
 */
class DotenvAdapter implements SettingsInterface
{
    /**
     * @var Dotenv
     */
    protected $settings;

    /**
     * DotenvAdapter constructor
     *
     * @param Dotenv $client
     */
    public function __construct(Dotenv $settings)
    {
        $this->settings = $settings->load();
    }

    /**
     * @inheritdoc
     */
    public function apiKey(): string
    {
        return getenv('FROST_API_KEY');
    }
}
