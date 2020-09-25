<?php

namespace Boekuwzending\Resource;

/**
 * Class Rate
 */
class Rate
{
    /**
     * @var RateService
     */
    private $service;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $tax;

    /**
     * @return RateService
     */
    public function getService(): RateService
    {
        return $this->service;
    }

    /**
     * @param RateService $service
     */
    public function setService(RateService $service): void
    {
        $this->service = $service;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getTax(): float
    {
        return $this->tax;
    }

    /**
     * @param float $tax
     */
    public function setTax(float $tax): void
    {
        $this->tax = $tax;
    }
}