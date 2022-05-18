<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\ClientCredentials;

class ClientSerializer implements SerializerInterface
{
    public function serialize($data): array
    {
        return [];
    }

    public function deserialize(array $data, string $dataType)
    {
        $client = new ClientCredentials();

        $client->setIdentifier($data['identifier']);
        $client->setSecret($data['secret']);

        return $client;
    }
}
