<?php

declare(strict_types=1);

namespace Boekuwzending\Resource;

/**
 * Class Label.
 */
class Label
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $waybill;

    /**
     * @var string|null
     */
    protected $reference;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getWaybill(): string
    {
        return $this->waybill;
    }

    /**
     * @param string $waybill
     */
    public function setWaybill(string $waybill): void
    {
        $this->waybill = $waybill;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }
}
