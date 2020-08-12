<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Distributor;
use LogicException;

/**
 * Class DistributorSerializer.
 */
class DistributorSerializer implements SerializerInterface
{
    /**
     * @param $data
     * @return array
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: DistributorSerializer::serialize');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return Distributor
     */
    public function deserialize(array $data, string $dataType): Distributor
    {
        $distributor = new Distributor();
        $distributor->setName($data['name']);
        $distributor->setCode($data['code']);

        return $distributor;
    }
}
