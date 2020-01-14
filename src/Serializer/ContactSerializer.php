<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Contact;

/**
 * Class ContactSerializer.
 */
class ContactSerializer implements SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function serialize($data): array
    {
        /** @var Contact $data */

        return [
            'name' => $data->getName(),
            'company' => $data->getCompany(),
            'phoneNumber' => $data->getPhoneNumber(),
            'emailAddress' => $data->getEmailAddress(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType)
    {
        return new Contact(
            $data['name'],
            $data['company'],
            $data['phoneNumber'],
            $data['emailAddress']
        );
    }
}
