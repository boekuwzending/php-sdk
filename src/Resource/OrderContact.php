<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

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
    public function getPlainPhoneNumber(): ?string
    {
        return $this->plainPhoneNumber;
    }

    /**
     * Set the "plain" (unformatted) phone number. Prefer calling setPhoneNumber to leverage parsing and validation.
     *
     * @param string|null $plainPhoneNumber
     */
    public function setPlainPhoneNumber(?string $plainPhoneNumber): void
    {
        $this->plainPhoneNumber = $plainPhoneNumber;
    }

    /**
     * Sets the phone number, tries to parse it. When parsing fails, it gets assigned to plainPhoneNumber.
     *
     * @param string|null $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            $phoneNumberParsed = $phoneUtil->parse($phoneNumber);
            $this->phoneNumber = $phoneUtil->format($phoneNumberParsed, PhoneNumberFormat::E164);
        } catch (NumberParseException $e) {
            $this->setPlainPhoneNumber($phoneNumber);
            $this->phoneNumber = null;
        }
    }
}
