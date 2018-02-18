<?php

namespace CryptoPete\Frost;

use CryptoPete\Frost\Adapter\Http\HttpInterface;
use CryptoPete\Frost\Adapter\Settings\SettingsInterface;

/**
 * Class FrostController
 *
 * Access the various API methods in the Frost API.
 *
 * See https://docs.frost.po.et/v0.1/reference for more details
 */
class FrostController
{
    const FrostApi = 'https://api.frost.po.et/works';

    /**
     * @var SettingsInterface
     */
    protected $settings;

    /**
     * @var HttpInterface
     */
    protected $client;

    /**
     * FrostController constructor.
     *
     * @param SettingsInterface $settings
     * @param HttpInterface     $client
     */
    public function __construct(SettingsInterface $settings, HttpInterface $client)
    {
        $this->settings = $settings;
        $this->client = $client;
    }

    /**
     * Create a new work in the Po.et ecosystem
     *
     * @param array $work The array of the work details
     *
     * @return array
     */
    public function createWork(array $work): array
    {
        return $this->toArray($this->client->post(self::FrostApi, $this->settings->apiKey(), $work));
    }

    /**
     * Fetch an individual work by passing the unique work id
     *
     * @param string|null $id Optional work id
     *
     * @return array
     */
    public function getWorkById(string $id = null): array
    {
        return $this->toArray($this->client->get(self::FrostApi . "/$id", $this->settings->apiKey()));
    }

    /**
     * Fetch all the works
     *
     * @return array
     */
    public function getWorks(): array
    {
        return $this->getWorkById();
    }

    /**
     * Return an array for all valid responses
     *
     * @param string $string The json response string
     *
     * @return array
     */
    protected function toArray(string $string): array
    {
        return json_decode($string, true);
    }
}
