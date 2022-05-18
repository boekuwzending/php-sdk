<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\ClientCredentials;
use Boekuwzending\Resource\Integration;
use Boekuwzending\Resource\Relation;
use Exception;

class IntegrationSerializer implements SerializerInterface
{
    /**
     * @param Integration $data
     */
    public function serialize($data): array
    {
        $response = [
            'id' => $data->getId(),
            'externalAccountId' => $data->getExternalAccountId(),
            'shopUrl' => $data->getShopUrl(),
        ];

        if (null !== ($relation = $data->getRelation())) {
            $response['relation'] = 'relations/'.$relation->getId();
        }

        return $response;
    }

    /**
     * @inheritDoc
     * @throws Exception
     *
     * @param class-string $dataType
     */
    public function deserialize(array $data, string $dataType)
    {
        /** @var Integration $object */
        $object = new $dataType;

        $object->setId($data['id']);
        $object->setExternalAccountId($data['externalAccountId']);
        $object->setShopUrl($data['shopUrl']);

        $serializer = new Serializer();

        if (!empty($data['relation'])) {
            $object->setRelation($serializer->deserialize($data['relation'], Relation::class));
        }

        if (!empty($data['client'])) {
            $object->setClient($serializer->deserialize($data['client'], ClientCredentials::class));
        }

        return $object;
    }
}
