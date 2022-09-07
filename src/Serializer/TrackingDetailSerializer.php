<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\TrackingDetail;
use DateTime;
use Exception;
use LogicException;

/**
 * Class TrackingDetailSerializer.
 */
class TrackingDetailSerializer implements SerializerInterface
{
    /**
     * @param $data
     * @return array
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: TrackingDetailSerializer::serialize');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return TrackingDetail
     * @throws Exception
     */
    public function deserialize(array $data, string $dataType): TrackingDetail
    {
        $trackingDetail = new TrackingDetail();
        $trackingDetail->setCode($data['code']);
        $trackingDetail->setStatus($data['status']);
        $trackingDetail->setDescription($data['description']);

        // API versioning: v2.
        if (array_key_exists('datetime', $data)) {
            $trackingDetail->setDate(new DateTime($data['datetime']));
        }

        return $trackingDetail;
    }
}
