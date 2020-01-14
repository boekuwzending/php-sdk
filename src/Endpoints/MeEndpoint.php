<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Resource\Me;

/**
 * Class ShipmentsEndpoint.
 */
class MeEndpoint extends AbstractEndpoint
{
    /**
     * @return Me
     */
    public function get(): Me
    {
        throw new \LogicException('Not yet implemented: MeEndpoint::get');
    }
}
