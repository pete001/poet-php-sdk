<?php

namespace CryptoPete\Frost\Exception;

/**
 * Class SettingsNotFoundException
 *
 * Thrown if the settings config (.env or equivalent) path is not valid
 */
class SettingsNotFoundException extends \Exception implements FrostThrowable
{
}
