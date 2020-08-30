<?php

declare(strict_types=1);

namespace Boekuwzending\Exception;

use Exception;

/**
 * Class IncompatiblePlatformException.
 */
class IncompatiblePlatformException extends Exception
{
    public const INCOMPATIBLE_PHP_VERSION = 1000;
    public const INCOMPATIBLE_CURL_EXTENSION = 2000;
    public const INCOMPATIBLE_JSON_EXTENSION = 3000;
}
