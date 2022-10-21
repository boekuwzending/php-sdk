<?php

namespace Boekuwzending\Tests\Serializer;

use Boekuwzending\Resource\Address;
use Boekuwzending\Resource\Contact;
use Boekuwzending\Resource\DispatchInstruction;
use Boekuwzending\Resource\Item;
use Boekuwzending\Resource\Shipment;
use Boekuwzending\Resource\DeliveryInstruction;
use Boekuwzending\Serializer\ShipmentSerializer;
use PHPUnit\Framework\TestCase;
use Boekuwzending\Tests\FakerTrait;

class ShipmentSerializerTest extends TestCase
{
    use FakerTrait;

    public function testShipment(): void
    {
        $shipmentItem = new Item();
        $shipmentItem->setCustomerReference('Hello');
        $shipmentItem->setQuantity(4);
        $shipmentItem->setType('package');
        $shipmentItem->setLength(120);
        $shipmentItem->setHeight(80);
        $shipmentItem->setWidth(60);
        $shipmentItem->setWeight(45);
        $shipmentItem->setDescription($this->getFaker()->text);

        $shipment = new Shipment();
        $shipment->addItem($shipmentItem);

        // Set to Contact for shipment
        $contactTo = new Contact();
        $contactTo->setName($this->getFaker()->name);
        $contactTo->setEmailAddress($this->getFaker()->email);
        $shipment->setShipToContact($contactTo);

        // Set to Address for shipment
        $addressTo = new Address();
        $addressTo->setPostcode($this->getFaker()->postcode);
        $addressTo->setCity($this->getFaker()->city);
        $addressTo->setCountryCode($this->getFaker()->countryCode);
        $shipment->setShipToAddress($addressTo);

        // Set Dispatch
        $dispatch = new DispatchInstruction();
        $dispatch->setDate($this->getFaker()->dateTime());
        $dispatch->setEoriNumber($this->getFaker()->randomNumber(9));
        $dispatch->setVatNumber($this->getFaker()->randomNumber(9));
        $shipment->setDispatch($dispatch);

        // Set Delivery
        $delivery = new DeliveryInstruction();
        $delivery->setDate($this->getFaker()->dateTime());
        $delivery->setEoriNumber($this->getFaker()->randomNumber(9));
        $delivery->setVatNumber($this->getFaker()->randomNumber(9));
        $shipment->setDelivery($delivery);

        $serializedShipment = (new ShipmentSerializer())->serialize($shipment);

        self::assertArrayHasKey('items', $serializedShipment);
        self::assertCount(1, $serializedShipment['items']);
        self::assertArrayHasKey('customerReference', $serializedShipment['items'][0]);
        self::assertSame('Hello', $serializedShipment['items'][0]['customerReference']);

        self::assertArrayHasKey('dispatch', $serializedShipment);
        self::assertArrayHasKey('date', $serializedShipment['dispatch']);
        self::assertArrayHasKey('eoriNumber', $serializedShipment['dispatch']);
        self::assertArrayHasKey('vatNumber', $serializedShipment['dispatch']);

        self::assertArrayHasKey('delivery', $serializedShipment);
        self::assertArrayHasKey('date', $serializedShipment['delivery']);
        self::assertArrayHasKey('eoriNumber', $serializedShipment['delivery']);
        self::assertArrayHasKey('vatNumber', $serializedShipment['delivery']);

        self::assertArrayHasKey('shipTo', $serializedShipment);
        self::assertArrayHasKey('contact', $serializedShipment['shipTo']);
        self::assertArrayHasKey('address', $serializedShipment['shipTo']);
    }
}
