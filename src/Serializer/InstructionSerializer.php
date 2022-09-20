<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\DeliveryInstruction;
use Boekuwzending\Resource\DispatchInstruction;
use DateTime;
use Exception;

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
            'vatNumber' => $data->getVatNumber(),
            'eoriNumber' => $data->getEoriNumber(),
        ];

        if (null !== $data->getDate()) {
            $response['date'] = $data->getDate()->format('Y-m-d');
        }

        return $response;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function deserialize(array $data, string $dataType)
    {
        /** @var DeliveryInstruction|DispatchInstruction */
        $object = new $dataType();
        $object->setInstructions($data['instructions']);
        $object->setReference($data['reference']);
        $object->setTimeWindowBegin($data['timeWindow']['begin']);
        $object->setTimeWindowEnd($data['timeWindow']['end']);
        $object->setVatNumber($data['vatNumber']);
        $object->setEoriNumber($data['eoriNumber']);

        if (!empty($data['date'])) {
            $object->setDate((new DateTime($data['date'])));
        }

        return $object;
    }
}
