<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Exception\SerializerNotFoundException;
use Boekuwzending\Resource\Address;
use Boekuwzending\Resource\Contact;
use Boekuwzending\Resource\DeliveryInstruction;
use Boekuwzending\Resource\DispatchInstruction;
use Boekuwzending\Resource\Item;
use Boekuwzending\Resource\Label;
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
            'service' => $data->getService(),
            'invoiceReference' => $data->getInvoiceReference(),
            'transportType' => $data->getTransportType(),
            'shipTo' => [
                'contact' => $serializer->serialize($data->getShipToContact()),
                'address' => $serializer->serialize($data->getShipToAddress()),
            ],
            'dispatch' => $serializer->serialize($data->getDispatch()),
            'items' => array_map(static function (Item $item) use ($serializer) {
                return $serializer->serialize($item);
            }, $data->getItems()),
        ];

        if (null !== $data->getShipFromContact()) {
            $response['shipFrom'] = [
                'contact' => $serializer->serialize($data->getShipFromContact()),
                'address' => $serializer->serialize($data->getShipFromAddress()),
            ];
        }

        if (null !== $data->getDpdNumber()) {
            $response['dpdNumber'] = $data->getDpdNumber();
        }

        if (null !== $data->getDpdDepotCode()) {
            $response['dpdDepotCode'] = $data->getDpdDepotCode();
        }

        if (null !== $data->getDelivery()) {
            $response['delivery'] = $data->getDelivery();
        }

        if (!empty($data->getIncoTerms())) {
            $response['incoTerms'] = $data->getIncoTerms();
        }

        return $response;
    }

    /**
     * @param array $data
     * @param string $dataType
     *
     * @return Shipment|mixed
     */
    public function deserialize(array $data, string $dataType)
    {
        $serializer = new Serializer();

        $shipment = new Shipment();
        $shipment->setTransportType($data['transportType']);
        $shipment->setShipFromContact($serializer->deserialize($data['shipFrom']['contact'], Contact::class));
        $shipment->setShipFromAddress($serializer->deserialize($data['shipFrom']['address'], Address::class));
        $shipment->setShipToContact($serializer->deserialize($data['shipTo']['contact'], Contact::class));
        $shipment->setShipToAddress($serializer->deserialize($data['shipTo']['address'], Address::class));
        $shipment->setDispatch($serializer->deserialize($data['dispatch'], DispatchInstruction::class));
        $shipment->setInvoiceReference($data['invoiceReference']);
        $shipment->setSequence($data['sequence']);
        $shipment->setService($data['service']);

        $items = [];
        foreach ($data['items'] as $item) {
            $items[] = $serializer->deserialize($item, Item::class);
        }

        $shipment->setItems($items);

        if (isset($data['id'])) {
            $shipment->setId($data['id']);
        }

        if (isset($data['dpdNumber'])) {
            $shipment->setDpdNumber($data['dpdNumber']);
        }

        if (isset($data['dpdDepotCode'])) {
            $shipment->setDpdDepotCode($data['dpdDepotCode']);
        }

        if (isset($data['incoTerms'])) {
            $shipment->setIncoTerms($data['incoTerms']);
        }

        if (isset($data['delivery'])) {
            $shipment->setDelivery($serializer->deserialize($data['delivery'], DeliveryInstruction::class));
        }

        if(isset($data['labels'])) {
            $labels = [];
            foreach($data['labels'] as $label) {
                $labels[] = $serializer->deserialize($label, Label::class);
            }

            $shipment->setLabels($labels);
        }

        return $shipment;
    }
}
