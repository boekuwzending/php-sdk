<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Serializer\Serializer;

/**
 * Class AbstractEndpoint.
 */
abstract class AbstractEndpoint
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * AbstractEndpoint constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->serializer = new Serializer();
    }
}
