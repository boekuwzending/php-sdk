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
     * Label constructor.
     *
     * @param string      $id
     * @param string      $waybill
     * @param string|null $reference
     */
    public function __construct(string $id, string $waybill, ?string $reference)
    {
        $this->id = $id;
        $this->waybill = $waybill;
        $this->reference = $reference;
    }

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
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }
}
