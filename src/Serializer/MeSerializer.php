<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Me;
use Boekuwzending\Resource\Relation;

/**
 * Class MeSerializer.
 */
class MeSerializer implements SerializerInterface
{
    /**
     * @param $data
     * @return array
     */
    public function serialize($data): array
    {
        throw new \LogicException('Not supported: MeSerializer::serialize');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return Me
     */
    public function deserialize(array $data, string $dataType): Me
    {
        $serializer = new Serializer();

        $me = new Me();

//        $me->setId($data['id']);
//        $me->setNumber($data['number']);
        $me->setName($data['name']);

        $me->setRelation($serializer->deserialize($data['relation'], Relation::class));

        return $me;
    }
}
