<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Distributor;
use Boekuwzending\Resource\TrackAndTrace;
use Boekuwzending\Resource\TrackingDetail;
use Exception;
use LogicException;

/**
 * Class TrackAndTraceSerializer.
 */
class TrackAndTraceSerializer implements SerializerInterface
{
    /**
     * @param $data
     * @return array
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: TrackAndTraceSerializer::serialize');
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return TrackAndTrace
     */
    public function deserialize(array $data, string $dataType): TrackAndTrace
    {
        $serializer = new Serializer();

        $trackingDetail = new TrackAndTrace();
        $trackingDetail->setActive($serializer->deserialize($data['active'], TrackingDetail::class));

        $details = [];
        foreach($data['details'] as $detail) {
            $details[] = $serializer->deserialize($detail, TrackingDetail::class);
        }

        $trackingDetail->setDetails($details);

        if (null !== $data['distributor']) {
            $trackingDetail->setDistributor($serializer->deserialize($data['distributor'], Distributor::class));
        }
        
        return $trackingDetail;
    }
}
