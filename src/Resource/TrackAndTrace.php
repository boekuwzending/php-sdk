<?php

namespace Boekuwzending\Resource;

/**
 * Class TrackAndTrace
 */
class TrackAndTrace
{
    /**
     * @var TrackingDetail
     */
    protected $active;

    /**
     * @var TrackingDetail[]
     */
    protected $details;

    /**
     * @var Distributor
     */
    protected $distributor;

    /**
     * @return TrackingDetail
     */
    public function getActive(): TrackingDetail
    {
        return $this->active;
    }

    /**
     * @param TrackingDetail $active
     */
    public function setActive(TrackingDetail $active): void
    {
        $this->active = $active;
    }

    /**
     * @return TrackingDetail[]
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    /**
     * @param TrackingDetail[] $details
     */
    public function setDetails(array $details): void
    {
        $this->details = $details;
    }

    /**
     * @return Distributor
     */
    public function getDistributor(): Distributor
    {
        return $this->distributor;
    }

    /**
     * @param Distributor $distributor
     */
    public function setDistributor(Distributor $distributor): void
    {
        $this->distributor = $distributor;
    }
}