<?php

namespace CryptoPete\Frost\Adapter\Settings;

interface SettingsInterface
{
    /**
     * Fetch the Frost API Key
     *
     * @return string
     */
    public function apiKey(): string;
}
