<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

use Boekuwzending\Exception\InvalidResourceArgumentException;

/**
 * Class Address.
 */
class Address
{
    /**
     * @var string|null
     */
    protected $street;

    /**
     * @var string|null
     */
    protected $number;

    /**
     * @var string|null
     */
    protected $numberAddition;

    /**
     * @var string
     */
    protected $postcode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string|null
     */
    protected $addressLine2;

    /**
     * @var bool
     */
    private $privateAddress;

    /**
     * @var bool|null
     */
    private $forkliftOrLoadingDockAvailable;

    /**
     * @var bool|null
     */
    private $accessibleWithTrailer;

    /**
     * Address constructor.
     *
     * @param string    $postcode
     * @param string    $city
     * @param string    $countryCode
     * @param bool      $privateAddress
     * @param string    $street
     * @param string    $number
     * @param string    $numberAddition
     * @param string    $addressLine2
     * @param bool|null $forkliftOrLoadingDockAvailable
     * @param bool|null $accessibleWithTrailer
     *
     * @throws InvalidResourceArgumentException
     */
    public function __construct(
        string $postcode,
        string $city,
        string $countryCode,
        bool $privateAddress,
        string $street = null,
        string $number = null,
        string $numberAddition = null,
        string $addressLine2 = null,
        bool $forkliftOrLoadingDockAvailable = null,
        bool $accessibleWithTrailer = null
    ) {
        $this->street = $street;
        $this->number = $number;
        $this->numberAddition = $numberAddition;
        $this->postcode = $postcode;
        $this->city = $city;
        $this->countryCode = $countryCode;
        $this->addressLine2 = $addressLine2;
        $this->privateAddress = $privateAddress;
        $this->forkliftOrLoadingDockAvailable = $forkliftOrLoadingDockAvailable;
        $this->accessibleWithTrailer = $accessibleWithTrailer;

        if (!empty($this->street) && strlen($this->street) > 35) {
            throw new InvalidResourceArgumentException('Address street must be 35 characters or shorter.');
        }

        if (!empty($this->number) && strlen($this->number) > 5) {
            throw new InvalidResourceArgumentException('Address number must be 5 characters or shorter.');
        }

        if (!empty($this->numberAddition) && strlen($this->numberAddition) > 10) {
            throw new InvalidResourceArgumentException('Address number addition must be 10 characters or shorter.');
        }

        if (!empty($this->addressLine2) && strlen($this->addressLine2) > 35) {
            throw new InvalidResourceArgumentException('Address line 2 must be 35 characters or shorter.');
        }

        if (!empty($this->postcode) && strlen($this->postcode) > 12) {
            throw new InvalidResourceArgumentException('Address postcode must be 12 characters or shorter.');
        }

        if (empty($this->postcode)) {
            throw new InvalidResourceArgumentException('Address postcode must not be empty.');
        }

        if (!empty($this->city) && strlen($this->city) > 25) {
            throw new InvalidResourceArgumentException('Address city must be 25 characters or shorter.');
        }

        if (empty($this->city)) {
            throw new InvalidResourceArgumentException('Address city must not be empty.');
        }

        if (!empty($this->countryCode) && strlen($this->countryCode) > 2) {
            throw new InvalidResourceArgumentException('Address country must be 2 characters or shorter.');
        }

        if (empty($this->countryCode)) {
            throw new InvalidResourceArgumentException('Address country must not be empty.');
        }
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @return string|null
     */
    public function getNumberAddition(): ?string
    {
        return $this->numberAddition;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @return bool
     */
    public function isPrivateAddress(): bool
    {
        return $this->privateAddress;
    }

    /**
     * @return bool|null
     */
    public function isForkliftOrLoadingDockAvailable(): ?bool
    {
        return $this->forkliftOrLoadingDockAvailable;
    }

    /**
     * @return bool|null
     */
    public function isAccessibleWithTrailer(): ?bool
    {
        return $this->accessibleWithTrailer;
    }
}
