<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Me;

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
        return new Me(
            $data['name'],
            $data['number'],
            $data['id']
        );
    }
}
