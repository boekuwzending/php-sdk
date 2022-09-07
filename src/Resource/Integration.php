<?php

namespace Boekuwzending\Resource;

abstract class Integration
{
    private $id;

    private $shopUrl;

    private $externalAccountId;

    private $relation;

    private $client;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getShopUrl(): string
    {
        return $this->shopUrl;
    }

    public function setShopUrl(string $shopUrl): void
    {
        $this->shopUrl = $shopUrl;
    }

    public function getExternalAccountId(): string
    {
        return $this->externalAccountId;
    }

    public function setExternalAccountId(string $externalAccountId): void
    {
        $this->externalAccountId = $externalAccountId;
    }

    public function getRelation(): Relation
    {
        return $this->relation;
    }

    public function setRelation(Relation $relation): void
    {
        $this->relation = $relation;
    }

    public function getClient(): ClientCredentials
    {
        return $this->client;
    }

    public function setClient(ClientCredentials $client): void
    {
        $this->client = $client;
    }
}
