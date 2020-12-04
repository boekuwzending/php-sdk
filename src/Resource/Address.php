<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

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
    protected $addressLine1;

    /**
     * @var string|null
     */
    protected $addressLine2;

    /**
     * @var bool
     */
    private $privateAddress = true;

    /**
     * @var bool
     */
    private $forkliftOrLoadingDockAvailable = false;

    /**
     * @var bool
     */
    private $accessibleWithTrailer = false;

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string|null
     */
    public function getNumberAddition(): ?string
    {
        return $this->numberAddition;
    }

    /**
     * @param string|null $numberAddition
     */
    public function setNumberAddition(?string $numberAddition): void
    {
        $this->numberAddition = $numberAddition;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     */
    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param string|null $addressLine2
     */
    public function setAddressLine2(?string $addressLine2): void
    {
        $this->addressLine2 = $addressLine2;
    }

    /**
     * @return bool
     */
    public function isPrivateAddress(): bool
    {
        return $this->privateAddress;
    }

    /**
     * @param bool $privateAddress
     */
    public function setPrivateAddress(bool $privateAddress): void
    {
        $this->privateAddress = $privateAddress;
    }

    /**
     * @return bool
     */
    public function isForkliftOrLoadingDockAvailable(): bool
    {
        return $this->forkliftOrLoadingDockAvailable;
    }

    /**
     * @param bool $forkliftOrLoadingDockAvailable
     */
    public function setForkliftOrLoadingDockAvailable(bool $forkliftOrLoadingDockAvailable): void
    {
        $this->forkliftOrLoadingDockAvailable = $forkliftOrLoadingDockAvailable;
    }

    /**
     * @return bool
     */
    public function isAccessibleWithTrailer(): bool
    {
        return $this->accessibleWithTrailer;
    }

    /**
     * @param bool $accessibleWithTrailer
     */
    public function setAccessibleWithTrailer(bool $accessibleWithTrailer): void
    {
        $this->accessibleWithTrailer = $accessibleWithTrailer;
    }

    /**
     * @return string|null
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * @param string|null $addressLine1
     */
    public function setAddressLine1(?string $addressLine1): void
    {
        $this->addressLine1 = $addressLine1;
    }
}
