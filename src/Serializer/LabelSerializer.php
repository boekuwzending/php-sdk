<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Label;
use LogicException;

/**
 * Class LabelSerializer.
 */
class LabelSerializer implements SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function serialize($data): array
    {
        throw new LogicException('Not yet implemented: LabelSerializer::serialize');
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType): Label
    {
        $label = new Label();
        $label->setId($data['id']);
        $label->setWaybill($data['waybill']);
        $label->setReference($data['reference']);
        $label->setTrackAndTraceLink($data['trackAndTraceLink']);

        return $label;
    }
}
