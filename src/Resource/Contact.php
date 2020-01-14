<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;

/**
 * Class Contact.
 */
class Contact
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $company;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * Contact constructor.
     *
     * @param string $name
     * @param string $company
     * @param string $phoneNumber
     * @param string $emailAddress
     *
     * @throws InvalidResourceArgumentException
     */
    public function __construct(string $name, string $company, string $phoneNumber, string $emailAddress)
    {
        $this->name = $name;
        $this->company = $company;
        $this->phoneNumber = $phoneNumber;
        $this->emailAddress = $emailAddress;

        if (!empty($this->name) && strlen($this->name) > 45) {
            throw new InvalidResourceArgumentException('Contact name must be 45 characters or shorter.');
        }

        if (!empty($this->company) && strlen($this->company) > 35) {
            throw new InvalidResourceArgumentException('Contact company must be 35 characters or shorter.');
        }

        if (!empty($this->phoneNumber) && strlen($this->phoneNumber) > 25) {
            throw new InvalidResourceArgumentException('Contact phone number must be 25 characters or shorter.');
        }

        if (strpos($this->phoneNumber, '+') !== 0) {
            throw new InvalidResourceArgumentException('Phone number must be in the following format: +31612345678.  ' . $this->phoneNumber);
        }

        if (!empty($this->emailAddress) && strlen($this->emailAddress) > 50) {
            throw new InvalidResourceArgumentException('Contact email address must be 50 characters or shorter.');
        }

        if (!filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidResourceArgumentException('Contact email address must be a valid email address.');
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }
}
