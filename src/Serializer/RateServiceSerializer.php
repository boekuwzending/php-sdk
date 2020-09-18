<?php

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\RateService;

/**
 * Class RateServiceSerializer
 */
class RateServiceSerializer implements SerializerInterface {
    /**
     * @param RateService $data
     * @return array
     */
    public function serialize($data): array
    {
        return [
            'description' => $data->getDescription(),
            'code' => $data->getCode()
        ];
    }

    /**
     * @param array $data
     * @param string $dataType
     * @return RateService
     */
    public function deserialize(array $data, string $dataType): RateService
    {
        $rateService = new RateService();
        $rateService->setDescription($data['description']);
        $rateService->setCode($data['code']);

        return $rateService;
    }
}