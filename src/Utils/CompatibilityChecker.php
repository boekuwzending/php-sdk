<?php

namespace Boekuwzending\Utils;

use Boekuwzending\Exception\IncompatiblePlatformException;

/**
 * Class CompatibilityChecker
 */
class CompatibilityChecker
{
    /**
     * @var string
     */
    public const MIN_PHP_VERSION = "7.1.0";

    /**
     * @return bool
     * @throws IncompatiblePlatformException
     */
    public function check(): bool
    {
        if (!$this->satisfiesPhpVersion()) {
            throw new IncompatiblePlatformException(
                "The SDK requires PHP version >= " . self::MIN_PHP_VERSION . ", you have " . PHP_VERSION . " installed.",
                IncompatiblePlatformException::INCOMPATIBLE_PHP_VERSION
            );
        }

        if (!$this->satisfiesJsonExtension()) {
            throw new IncompatiblePlatformException(
                "PHP extension json is not enabled. Please make sure to enable 'json' in your PHP configuration.",
                IncompatiblePlatformException::INCOMPATIBLE_JSON_EXTENSION
            );
        }

        if (!$this->satisfiesCurlExtension()) {
            throw new IncompatiblePlatformException(
                "PHP extension curl is not enabled. Please make sure to enable 'curl' in your PHP configuration.",
                IncompatiblePlatformException::INCOMPATIBLE_CURL_EXTENSION
            );
        }

        return true;
    }

    /**
     * @return bool
     */
    public function satisfiesPhpVersion(): bool
    {
        return (bool)version_compare(PHP_VERSION, self::MIN_PHP_VERSION, ">=");
    }

    /**
     * @return bool
     */
    public function satisfiesJsonExtension(): bool
    {
        // Check by extension_loaded
        if (function_exists('extension_loaded') && extension_loaded('json')) {
            return true;
        }

        if (function_exists('json_encode')) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function satisfiesCurlExtension(): bool
    {
        // Check by extension_loaded
        return function_exists('extension_loaded') && extension_loaded('curl');
    }
}