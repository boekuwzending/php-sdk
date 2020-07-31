<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\MatrixRate;
use Boekuwzending\Resource\Service;
use LogicException;

/**
 * Class MatrixRateSerializer.
 */
class MatrixRateSerializer implements SerializerInterface
{
    /**
     * @param $data
     * @return array
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: MatrixRateSerializer::serialize');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return MatrixRate
     */
    public function deserialize(array $data, string $dataType): MatrixRate
    {
        $serializer = new Serializer();

        $matrixRate = new MatrixRate();
        $matrixRate->setId($data['id']);
        $matrixRate->setPrice($data['price']);
        $matrixRate->setService($serializer->deserialize($data['service'], Service::class));

        return $matrixRate;
    }
}
