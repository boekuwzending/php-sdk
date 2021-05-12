<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Dimensions;
use LogicException;

/**
 * Class DimensionsSerializer.
 */
class DimensionsSerializer implements SerializerInterface
{
    /**
     * @param $data
     * @return array
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: DimensionsSerializer::serialize');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return Dimensions
     */
    public function deserialize(array $data, string $dataType): Dimensions
    {
        $dimensions = new Dimensions();

        if (true === array_key_exists('length', $data)) {
            $dimensions->setLength($data['length']);
        }

        if (true === array_key_exists('height', $data)) {
            $dimensions->setHeight($data['height']);
        }

        if (true === array_key_exists('width', $data)) {
            $dimensions->setWidth($data['width']);
        }

        return $dimensions;
    }
}
