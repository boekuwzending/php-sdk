<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Exception\SerializerNotFoundException;
use Boekuwzending\Resource\Address;
use Boekuwzending\Resource\ClientCredentials;
use Boekuwzending\Resource\Contact;
use Boekuwzending\Resource\DeliveryInstruction;
use Boekuwzending\Resource\Dimensions;
use Boekuwzending\Resource\DispatchInstruction;
use Boekuwzending\Resource\Distributor;
use Boekuwzending\Resource\Item;
use Boekuwzending\Resource\Label;
use Boekuwzending\Resource\Matrix;
use Boekuwzending\Resource\MatrixRate;
use Boekuwzending\Resource\Me;
use Boekuwzending\Resource\Order;
use Boekuwzending\Resource\OrderContact;
use Boekuwzending\Resource\OrderLine;
use Boekuwzending\Resource\OrderOverview;
use Boekuwzending\Resource\PickupPoint;
use Boekuwzending\Resource\Rate;
use Boekuwzending\Resource\RateService;
use Boekuwzending\Resource\Relation;
use Boekuwzending\Resource\Service;
use Boekuwzending\Resource\Shipment;
use Boekuwzending\Resource\ShopifyIntegration;
use Boekuwzending\Resource\TrackAndTrace;
use Boekuwzending\Resource\TrackingDetail;

/**
 * Class Serializer.
 */
class Serializer implements SerializerInterface
{
    /**
     * @var SerializerInterface[]
     */
    private $serializers;

    /**
     * Serializer constructor.
     */
    public function __construct()
    {
        $this->serializers = [
            Shipment::class => new ShipmentSerializer(),
            Contact::class => new ContactSerializer(),
            Address::class => new AddressSerializer(),
            ClientCredentials::class => new ClientSerializer(),
            DispatchInstruction::class => new InstructionSerializer(),
            DeliveryInstruction::class => new InstructionSerializer(),
            Item::class => new ItemSerializer(),
            Me::class => new MeSerializer(),
            Label::class => new LabelSerializer(),
            Dimensions::class => new DimensionsSerializer(),
            MatrixRate::class => new MatrixRateSerializer(),
            Matrix::class => new MatrixSerializer(),
            Service::class => new ServiceSerializer(),
            TrackAndTrace::class => new TrackAndTraceSerializer(),
            TrackingDetail::class => new TrackingDetailSerializer(),
            Distributor::class => new DistributorSerializer(),
            PickupPoint::class => new PickupPointSerializer(),
            Rate::class => new RateSerializer(),
            RateService::class => new RateServiceSerializer(),
            Relation::class => new RelationSerializer(),
            ShopifyIntegration::class => new IntegrationSerializer(),
            OrderContact::class => new OrderContactSerializer(),
            OrderLine::class => new OrderLineSerializer(),
            Order::class => new OrderSerializer(),
            OrderOverview::class => new OrderOverviewSerializer(),
        ];
    }

    /**
     * @param $data
     *
     * @return array
     */
    public function serialize($data): array
    {
        $serializer = $this->getSerializer(get_class($data));

        return $serializer->serialize($data);
    }

    /**
     * @param array  $data
     * @param string $dataType
     *
     * @return mixed
     */
    public function deserialize(array $data, string $dataType)
    {
        $serializer = $this->getSerializer($dataType);

        return $serializer->deserialize($data, $dataType);
    }

    /**
     * @param string $dataType
     *
     * @return SerializerInterface
     */
    private function getSerializer(string $dataType): SerializerInterface
    {
        foreach ($this->serializers as $type => $serializer) {
            if ($type === $dataType) {
                return $serializer;
            }
        }

        throw new SerializerNotFoundException(
            sprintf('No serializer available for type %s', $dataType)
        );
    }
}
