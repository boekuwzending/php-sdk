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
     * @inheritDoc
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: DimensionsSerializer::serialize');
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType): Dimensions
    {
        $dimensions = new Dimensions();
        $dimensions->setLength($data['length']);
        $dimensions->setHeight($data['height']);
        $dimensions->setWidth($data['width']);

        return $dimensions;
    }
}
