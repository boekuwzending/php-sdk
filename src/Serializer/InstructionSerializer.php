<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\DeliveryInstruction;
use Boekuwzending\Resource\DispatchInstruction;

/**
 * Class InstructionSerializer.
 */
class InstructionSerializer implements SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function serialize($data): array
    {
        /** @var DispatchInstruction|DeliveryInstruction $data */

        $response = [
            'instructions' => $data->getInstructions(),
            'reference' => $data->getReference(),
            'timeWindow' => [
                'begin' => $data->getTimeWindowBegin(),
                'end' => $data->getTimeWindowEnd(),
            ],
        ];

        if (null !== $data->getDate()) {
            $response['date'] = $data->getDate()->getTimestamp();
        }

        return $response;
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType)
    {
        /** @var DeliveryInstruction|DispatchInstruction */
        return new $dataType(
            !empty($data['date']) ? new \DateTime($data['date']) : null,
            $data['instructions'],
            $data['reference'],
            $data['timeWindow']['begin'],
            $data['timeWindow']['end']
        );
    }
}
