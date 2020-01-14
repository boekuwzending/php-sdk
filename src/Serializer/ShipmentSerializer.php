<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Exception\SerializerNotFoundException;
use Boekuwzending\Resource\Address;
use Boekuwzending\Resource\Contact;
use Boekuwzending\Resource\DeliveryInstruction;
use Boekuwzending\Resource\DispatchInstruction;
use Boekuwzending\Resource\Item;
use Boekuwzending\Resource\Shipment;

/**
 * Class ShipmentSerializer.
 */
class ShipmentSerializer implements SerializerInterface
{
    /**
     * @param Shipment $data
     *
     * @return array
     * @throws SerializerNotFoundException
     */
    public function serialize($data): array
    {
        /** @var Shipment $data */

        $serializer = new Serializer();

        $response = [
            'invoiceReference' => $data->getInvoiceReference(),
            'transportType' => $data->getTransportType(),
            'shipFrom' => [
                'contact' => $serializer->serialize($data->getShipFromContact()),
                'address' => $serializer->serialize($data->getShipFromAddress()),
            ],
            'shipTo' => [
                'contact' => $serializer->serialize($data->getShipToContact()),
                'address' => $serializer->serialize($data->getShipToAddress()),
            ],
            'dpdNumber' => $data->getDpdNumber(),
            'dpdDepotCode' => $data->getDpdDepotCode(),
            'dispatch' => $serializer->serialize($data->getDispatch()),
            'delivery' => $serializer->serialize($data->getDelivery()),
            'items' => array_map(static function (Item $item) use ($serializer) {
                return $serializer->serialize($item);
            }, $data->getItems()),
        ];

        if (!empty($data->getIncoTerms())) {
            $response['incoTerms'] = $data->getIncoTerms();
        }

        return $response;
    }

    /**
     * @param array  $data
     * @param string $dataType
     *
     * @return Shipment|mixed
     */
    public function deserialize(array $data, string $dataType)
    {
        $serializer = new Serializer();

        return new Shipment(
            $data['transportType'],
            $serializer->deserialize($data['shipFrom']['contact'], Contact::class),
            $serializer->deserialize($data['shipFrom']['address'], Address::class),
            $serializer->deserialize($data['shipTo']['contact'], Contact::class),
            $serializer->deserialize($data['shipTo']['address'], Address::class),
            $serializer->deserialize($data['dispatch'], DispatchInstruction::class),
            $serializer->deserialize($data['delivery'], DeliveryInstruction::class),
            [],
            $data['invoiceReference'],
            $data['incoTerms'],
            $data['dpdNumber'] ?? null,
            $data['dpdDepotCode'] ?? null
        );
    }
}
