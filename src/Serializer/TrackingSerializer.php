<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Tracking;
use Boekuwzending\Resource\TrackingLine;

/**
 * Class TrackingSerializer.
 */
class TrackingSerializer implements SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function serialize($data): array
    {
        throw new \LogicException('Not yet implemented: TrackingSerializer::serialize');
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType)
    {
        dd($data);
        $serializer = new Serializer();

        $lines = array_map(static function (array $line) use ($serializer) {
            return $serializer->deserialize($line, TrackingLine::class);
        }, $data['lines']);

        return new Tracking($data['id'], $lines);
    }
}
