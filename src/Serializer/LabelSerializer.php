<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Label;

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
        throw new \LogicException('Not yet implemented: LabelSerializer::serialize');
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType): Label
    {
        return new Label(
            $data['id'],
            $data['waybill'],
            $data['reference']
        );
    }
}
