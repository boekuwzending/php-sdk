<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

/**
 * Class SerializerInterface.
 */
interface SerializerInterface
{
    /**
     * @param $data
     *
     * @return array
     */
    public function serialize($data): array;

    /**
     * @param array  $data
     * @param string $dataType
     *
     * @return mixed
     */
    public function deserialize(array $data, string $dataType);
}
