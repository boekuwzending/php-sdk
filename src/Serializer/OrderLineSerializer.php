<?php

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Dimensions;
use Boekuwzending\Resource\OrderLine;

/**
 * Class OrderLineSerializer
 */
class OrderLineSerializer implements SerializerInterface
{
    /**
     * @param OrderLine $data
     * @return array
     */
    public function serialize($data): array
    {
        $serializer = new Serializer();

        return [
            'externalId' => $data->getExternalId(),
            'quantity' => $data->getQuantity(),
            'dimensions' => $data->getDimensions() ? $serializer->serialize($data->getDimensions()) : null,
            'weight' => $data->getWeight() ?? 1,
            'description' => $data->getDescription(),
            'value' => $data->getValue(),
            'tariffNumber' => $data->getTariffNumber(),
            'skuNumber' => $data->getSkuNumber(),
            'eanNumber' => $data->getEanNumber(),
        ];
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return OrderLine
     */
    public function deserialize(array $data, string $dataType): OrderLine
    {
        $serializer = new Serializer();

        $line = new OrderLine();
        $line->setExternalId($data['externalId']);
        $line->setQuantity($data['quantity']);
        $line->setWeight($data['weight']);
        $line->setDimensions($serializer->deserialize($data['dimensions'], Dimensions::class));
        $line->setDescription($data['description']);
        $line->setValue($data['value']);

        if(isset($data['tariffNumber'])) {
            $line->setTariffNumber($data['tariffNumber']);
        }

        if (isset($data['skuNumber'])) {
            $line->setSkuNumber($data['skuNumber']);
        }

        if (isset($data['eanNumber'])) {
            $line->setEanNumber($data['eanNumber']);
        }

        return $line;
    }
}