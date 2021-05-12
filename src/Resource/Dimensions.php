<?php

namespace Boekuwzending\Resource;

/**
 * Class Dimensions
 */
class Dimensions
{
    /**
     * @var float|null
     */
    protected $length;

    /**
     * @var float|null
     */
    protected $width;

    /**
     * @var float|null
     */
    protected $height;

    /**
     * @return float|null
     */
    public function getLength(): ?float
    {
        return $this->length;
    }

    /**
     * @param float|null $length
     */
    public function setLength(?float $length): void
    {
        $this->length = $length;
    }

    /**
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }

    /**
     * @param float|null $width
     */
    public function setWidth(?float $width): void
    {
        $this->width = $width;
    }

    /**
     * @return float|null
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }

    /**
     * @param float|null $height
     */
    public function setHeight(?float $height): void
    {
        $this->height = $height;
    }
}