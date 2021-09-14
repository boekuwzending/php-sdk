<?php

declare(strict_types=1);

namespace Boekuwzending\Serializer;

use Boekuwzending\Resource\Contact;
use Boekuwzending\Resource\OrderContact;

/**
 * Class OrderContactSerializer.
 */
class OrderContactSerializer extends ContactSerializer
{
    /**
     * @inheritDoc
     */
    public function serialize($data): array
    {
        /** @var OrderContact $data */
        $response = parent::serialize($data);

        if (null !== $data->getPlainPhoneNumber()) {
            $response['plainPhoneNumber'] = $data->getPlainPhoneNumber();
        }

        return $response;
    }

    /**
     * @inheritDoc
     */
    public function deserialize(array $data, string $dataType)
    {
        $contact = new OrderContact();

        $this->populate($contact, $data);

        if (isset($data['plainPhoneNumber'])) {
            $contact->setPlainPhoneNumber($data['plainPhoneNumber']);
        }

        return $contact;
    }
}
