<?php

declare(strict_types=1);

namespace Boekuwzending\Endpoints;

use Boekuwzending\Client;
use Boekuwzending\Exception\AuthorizationFailedException;
use Boekuwzending\Exception\RequestFailedException;
use Boekuwzending\Resource\Integration;
use Boekuwzending\Resource\ShopifyIntegration;
use InvalidArgumentException;

class IntegrationEndpoint extends AbstractEndpoint
{
    /**
     * @throws AuthorizationFailedException
     * @throws RequestFailedException
     */
    public function create(Integration $integration): Integration
    {
        if (get_class($integration) !== ShopifyIntegration::class) {
            throw new InvalidArgumentException('Unsupported integration type');
        }

        $query = [];
        if (isset($_COOKIE['XDEBUG_SESSION'])) {
            $query['XDEBUG_SESSION'] = $_COOKIE['XDEBUG_SESSION'];
        }

        $data = $this->client->request(
            '/integrations/shopify',
            Client::METHOD_POST,
            $this->serializer->serialize($integration),
            $query,
        );

        return $this->serializer->deserialize($data, ShopifyIntegration::class);
    }
}
