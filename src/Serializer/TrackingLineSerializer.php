<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\TrackingLine;

/**
 * Class TrackingLineSerializer.
 */
class TrackingLineSerializer implements SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function serialize($data): array
    {
        throw new \LogicException('Not yet implemented: TrackingLineSerializer::serialize');
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType): TrackingLine
    {
        return new TrackingLine(
            $data['status'],
            $data['description'],
            $data['location'],
            !empty($data['date_time']) ? new \DateTime($data['date_time']) : null
        );
    }
}
