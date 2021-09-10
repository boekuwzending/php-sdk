<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

/**
 * Class OrderContact.
 */
class OrderContact extends Contact
{
    /**
     * @var string
     */
    protected $plainPhoneNumber;

    /**
     * @return string
     */
    public function getPlainPhoneNumber(): string
    {
        return $this->plainPhoneNumber;
    }

    /**
     * @param string $plainPhoneNumber
     */
    public function setPlainPhoneNumber(string $plainPhoneNumber): void
    {
        $this->plainPhoneNumber = $plainPhoneNumber;
    }

}
