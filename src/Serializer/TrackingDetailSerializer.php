<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Distributor;
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
     * @inheritDoc
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: TrackingDetailSerializer::serialize');
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function deserialize(array $data, string $dataType): TrackingDetail
    {
        $trackingDetail = new TrackingDetail();
        $trackingDetail->setCode($data['code']);
        $trackingDetail->setStatus($data['status']);
        $trackingDetail->setDescription($data['description']);
        $trackingDetail->setDate(new DateTime($data['date']));

        return $trackingDetail;
    }
}
