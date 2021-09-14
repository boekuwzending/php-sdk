<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

/**
 * Class OrderContact.
 */
class OrderContact extends Contact
{
    /**
     * @var string|null
     */
    protected $plainPhoneNumber;

    /**
     * @return string|null
     */
    public function getPlainPhoneNumber(): string
    {
        return $this->plainPhoneNumber;
    }

    /**
     * @param string|null $plainPhoneNumber
     */
    public function setPlainPhoneNumber(?string $plainPhoneNumber): void
    {
        $this->plainPhoneNumber = $plainPhoneNumber;
    }

}
