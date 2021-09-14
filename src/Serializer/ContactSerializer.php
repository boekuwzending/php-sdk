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
        $response = [
            'name' => $data->getName(),
            'emailAddress' => $data->getEmailAddress(),
        ];

        if (null !== $data->getPhoneNumber()) {
            $response['phoneNumber'] = $data->getPhoneNumber();
        }

        if (null !== $data->getCompany()) {
            $response['company'] = $data->getCompany();
        }

        return $response;
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType)
    {
        $contact = new Contact();

        $this->populate($contact, $data);

        return $contact;
    }

    protected function populate(Contact $contact, array $data): void
    {
        $contact->setName($data['name']);
        $contact->setEmailAddress($data['emailAddress']);

        if(isset($data['phoneNumber'])) {
            $contact->setPhoneNumber($data['phoneNumber']);
        }

        if(isset($data['company'])) {
            $contact->setCompany($data['company']);
        }
    }
}
