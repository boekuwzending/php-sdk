<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Dimensions;
use Boekuwzending\Resource\Matrix;
use Boekuwzending\Resource\MatrixRate;
use LogicException;

/**
 * Class MatrixSerializer.
 */
class MatrixSerializer implements SerializerInterface
{
    /**
     * @param $data
     * @return array
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: MatrixSerializer::serialize');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return Matrix
     */
    public function deserialize(array $data, string $dataType): Matrix
    {
        $serializer = new Serializer();

        $dimensions = $serializer->deserialize($data['maxDimensions'], Dimensions::class);

        $matrix = new Matrix();
        $matrix->setId($data['id']);
        $matrix->setName($data['name']);
        $matrix->setMaxWeight($data['maxWeight']);

        $matrix->setMaxDimensions($dimensions);

        $rates = [];
        foreach ($data['rates'] as $rate) {
            $rates[] = $serializer->deserialize($rate, MatrixRate::class);
        }

        $matrix->setRates($rates);

        return $matrix;
    }
}
