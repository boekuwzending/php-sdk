<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Relation;

class RelationSerializer implements SerializerInterface
{
    /**
     * @param Relation $data
     * @return array
     */
    public function serialize($data): array
    {
        return [
            'id' => $data->getId(),
        ];
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return Relation
     */
    public function deserialize(array $data, string $dataType): Relation
    {
        $rate = new Relation();

        $rate->setId($data['id']);

        return $rate;
    }
}
